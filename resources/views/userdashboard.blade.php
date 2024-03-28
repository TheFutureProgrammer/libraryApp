@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h1>Books</h1>
    <a href="/" class="btn btn-dark">Log Out</a>

    <table class="table full-width-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year Published</th>
                <th>ISBN</th>
                <th>Copies Available</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td><img src="{{ asset('images/' . $book->image) }}" alt="Book Image"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year_published }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->copies_available }}</td>
                    <td>
                        @if(!$book->isBorrowed())
                            <!-- Form for borrowing -->
                            <form action="{{ route('borrow', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary me-2">Borrow</button>
                            </form>

                        @else
                            <!-- Display information for borrowed book -->
                            <p>Book Borrowed</p>
                            <!-- Form for returning -->
                            <form action="{{ route('return', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
