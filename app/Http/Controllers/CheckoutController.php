<?php

namespace App\Http\Controllers;

use App\Checkout;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $auth = Auth::user()->isLibrarian;
        $u_id = Auth::user()->id;
        if($auth) {
            $checked_books = Checkout::all();
        } else {
            $checked_books = Checkout::where('user_id','=',$u_id);
        }

        return view('home', ['checked_books' => $checked_books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checked_book = $request->request->all();

        $checked_out = Checkout::create([
            "book_id" => $checked_book['book_id'],
            "user_id" => $checked_book['user_id'],
            "checked_time" => $checked_book['checked_time'],
            "due_date" => $checked_book['due_date']
        ]);
        $checked_books = Checkout::all();
        return view('home', ['checked_books' => $checked_books]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
