@extends('layouts.edit')

@section('title', 'Update Book')

@section('header', 'Update Book')

@section('content')

<div class="container">
    <form action="{{ route('update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="image" class="form-label">Book Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>

        <div class="mb-3">
            <label for="year_published" class="form-label">Year Published</label>
            <input type="text" class="form-control" id="year_published" name="year_published"
                value="{{ $book->year_published }}">
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}">
        </div>

        <div class="mb-3">
            <label for="copies_available" class="form-label">Copies Available</label>
            <input type="text" class="form-control" id="copies_available" name="copies_available"
                value="{{ $book->copies_available }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection
