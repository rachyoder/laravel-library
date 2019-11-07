<?php

namespace App\Http\Controllers;

use App\Book;
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
        //dd($books);
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
    public function destroy(Books $books)
    {
        //
    }

    public function addBook (Request $request)
    {
        $books = ($request->request->all());
        foreach($books['booksList'] as $book){
            $newBook = Book::create([
                'title' => $books['title-'.$book],
                'author' => $books['author-'.$book]
            ]);
        }
        return view('books.index', ['books' => $books]);
    }
}
