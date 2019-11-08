@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Checked Out Books</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @isset($checked_books)
                    <table class="table text-center">
                        <thead>
                            <tr>
                                @if( Auth::User()->isLibrarian )
                                <th>User</th>
                                @endif
                                <th>Books</th>
                                <th>Date Checked Out</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($checked_books as $checked_book)
                            <tr>
                                
                                @if(Auth::User()->isLibrarian)
                                    <td>{{$checked_book->cardholder->name}}</td>
                                @endif
                                <td>{{ $checked_book->book->title }}</td>
                                <td>{{ $checked_book->checked_time }}</td>
                                <td>{{ $checked_book->due_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
