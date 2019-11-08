@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        Search Books
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" aria-label="Title">
                            </div>
                            <div class="form-group mb-4">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" aria-label="Author">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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