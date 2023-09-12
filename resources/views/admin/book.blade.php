@extends('layouts.app')
@section('title')
    Admin Books
@endsection

@section('content')
    <div class="container-fluid p-3  mt-5 table-responsive">
        <div class="row">
            <div class="col-2">
                @extends('layouts.sidenav')
            </div>
            <div class="col-10">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary me-md-2" href={{ route('admin.createbook') }}>Add Books</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <td scope="col">Image</td>
                            <td scope="col">Title</td>
                            <td scope="col">Author</td>
                            <td scope="col">Year</td>
                            <td scope="col">Description</td>
                            <td scope="col">Category</td>
                            <td scope="col">Book</td>
                            <td colspan="2" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="text-center">
                                <td><img src="{{ asset('storage/' . $book->image) }}" alt="" height="100px"></td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->category_id }}</td>
                                <td><a href="{{ asset('storage/' . $book->pdf) }}">View Book</td>
                                <td class="text-center"><a class="btn btn-info"
                                        href="/admin/{{ $book->id }}/editbook">Edit</a></td>
                                <td class="text-center">
                                    <form action="/admin/{{ $book->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
