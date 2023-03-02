@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $book->title }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $book->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
