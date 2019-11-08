<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $title = $request['title'] ? 'intitle:'.$request['title'] : '';
        $author = $request['author'] ? '+inauthor:'.$request['author'] : '';
        $client = new Client(['base_uri' => 'https://www.googleapis.com/books/v1/volumes']);
        $response = $client->get('?q='.$title.$author.'&key=AIzaSyCk71MSlsoFy0KsanlLwoNmmlGNgq8ASsI');
        $books = json_decode($response->getBody()->getContents())->items;
        return view('books.add', ['books' => $books]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // die('hello');
        DB::table('books')->where('title', '=', $request->book)->delete();
        $books = DB::table('books')->get();
        return view('books.index', ['books' => $books]);
    }

    public function addBook(Request $request)
    {
        $book_id = ($request->request->all());
        foreach($book_id['booksList'] as $book){
            $book = Book::create([
                'title' => $book_id['title-'.$book],
                'author' => $book_id['author-'.$book]
            ]);
        }
        $books = DB::table('books')->get();
        return view('books.index', ['books' => $books]);
    }
}
