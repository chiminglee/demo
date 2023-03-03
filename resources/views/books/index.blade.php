@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<!-- index.blade.php -->
@if (\Session::has('message'))
<div class="alert alert-success text-center">
	<h2>{!! \Session::get('message') !!}</h2>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Books</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Published At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->published_at }}</td>
                                    <td>
                                        <a href="{{ route('books.edit', $book) }}">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('books.create') }}">Create New Book</a>
@endsection