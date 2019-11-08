@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @isset($checked_books)
                    <table class="table">
                        <tbody>
                            @foreach($checked_books as $checked_book)
                            <tr>
                                <td>{{ $checked_book->book->title }}</td>
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
