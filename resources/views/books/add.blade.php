@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Books</div>
                    <div class="card-body">
                        <form>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Title</span>
                                </div>
                                <input type="text" class="form-control" id="title" aria-label="Title" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">Author</span>
                                </div>
                                <input type="text" class="form-control" id="author" aria-label="Author" aria-describedby="basic-addon2">
                            </div>

                            <button type="submit" clss="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>


@endsection