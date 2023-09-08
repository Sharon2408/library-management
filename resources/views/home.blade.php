@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container">
    <a class="btn btn-outline-primary" href={{route('library.createbook')}}>ADD BOOK</a>
    <br><br>
        <div class="row gx-5 gy-5">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href={{ route('library.book', ['cat' => $category->id]) }}>
                        <div class="card shadow-lg" style="width: 18rem;">
                            <img src={{ $category->image }} class="card-img-top" alt={{ $category->category }}>
                            <div class="card-body card-img-overlay text-light text-center mt-5">
                                <p class="card-text text-white bg-dark bg-opacity-75 mt-5 fs-5">{{ $category->category }}</p>
                            </div>
                    </a>
                </div>
        </div>
        @endforeach
        <br>
    </div>
    </div>
@endsection
