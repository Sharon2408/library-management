@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src={{$book->image}} class="img-fluid rounded-start" alt="book_image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                    <p class="card-text">{{$book->description}}</p>
                                    <p class="card-text"><small class="text-muted">{{$book->author}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
