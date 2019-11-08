<?php
$dt = new DateTime();
$dt_str = $dt->format('m-d-Y H:i:s');
$due = new DateInterval('P30D');
$dd = new DateTime();
$dd->add($due);
$dd_str = $dd->format('m-d-Y H:i:s');
?>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        @if( Auth::User()->isLibrarian )
                        <a href="/books/add">Add More Books</a>
                        @else
                        Books Catalog
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    @if( Auth::User()->isLibrarian )
                                        <th scope="col">Delete</th>
                                    @endif
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Check Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    @if(Auth::User()->isLibrarian)
                                    <form method="POST" action="/books/delete">
                                        @csrf
                                        @method("POST")
                                        <td>
                                            <input type="hidden" name="book" value="{{$book->title}}" />
                                            <input type="submit" value="X">
                                        </td>
                                    </form>
                                    @endif
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->author}}</td>
                                    <form method="POST" action="/home/checkout">
                                        @csrf
                                        <td>
                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                            <input type="hidden" name="book_id" value="{{$book->id}}" />
                                            <input type="hidden" name="checked_time" value="{{$dt_str}}" />
                                            <input type="hidden" name="due_date" value="{{$dd_str}}" />
                                            <input type="submit" value="Checkout Book" />
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection