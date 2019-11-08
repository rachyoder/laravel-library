<?php

$author = "Ghost Writer";

?>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add Books</div>
                    <div class="card-body">
                        <form method="POST" action="/books">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title" id="basic-addon1">Title:</label>
                                <input type="text" class="form-control" name="title" aria-label="Title" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group mb-3">
                                <label for="author" id="basic-addon2">Author:</label>
                                <input type="text" class="form-control" name="author" aria-label="Author" aria-describedby="basic-addon2">
                            </div>

                            <button type="submit" clss="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        @isset ($books)
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h6>Books Found:</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/books/add">
                            @csrf
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Add Book</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @foreach($books as $book)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="title-{{ $book->id }}" value="{{$book->volumeInfo->title}}" />
                                                {{ $book->volumeInfo->title }}
                                            </td>
                                            <td>
                                                @if(array_key_exists('authors',$book->volumeInfo))

                                                    @if(count($book->volumeInfo->authors))
                                                        {{ $author = $book->volumeInfo->authors[0]}}
                                                    @endif

                                                @endif
                                                <input type="hidden" name="author-{{ $book->id }}" value="{{$author}}" />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="booksList[]" value="{{ $book->id }}" />
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                </tbody>
                            </table>
                        <input type="submit" name="submit" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endisset
    </div>


@endsection