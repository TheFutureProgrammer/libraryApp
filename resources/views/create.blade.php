@extends('layouts.app')

@section('title', 'Book List')

@section('header', '')

@section('content')  
    <div class="container">
        <h2>Add Book</h2>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
            </div>

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" placeholder="Title" required>

            <label for="author">Author:</label>
            <input type="text" name="author" id="author" placeholder="Author" required>

            <label for="year_published">Year Published:</label>
            <input type="text" name="year_published" id="year_published" placeholder="Year Published" required>

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" placeholder="ISBN" required>

            <label for="copies_available">Copies Available:</label>
            <input type="text" name="copies_available" id="copies_available" placeholder="Copies Available" required>

            <button type="submit">ADD BOOK</button>
        </form>
        <br>
        <a href="{{ route('index') }}">Back</a>
    </div>
@endsection
