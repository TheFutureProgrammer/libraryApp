@extends('layouts.app')

@section('title', 'Borrowed Books')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Borrowed Books</h1>
    <a href="/index" class="btn btn-primary ml-auto">Back</a>
    <table>
        <tr>
            <th>NAME</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>YEAR PUBLISHED</th>
            <th>ISBN</th>
            <th>BORROWED AT</th>
            <th>RETURNED AT</th>
        </tr>
        @foreach ($borrows as $borrow)
            <tr>
            <td>{{ $borrow->user->name }}</td>
                <td>{{ $borrow->book->title }}</td>
                <td>{{ $borrow->book->author }}</td>
                <td>{{ $borrow->book->year_published }}</td>
                <td>{{ $borrow->book->isbn }}</td>
                <td>{{ $borrow->borrowed_at }}</td>
                <td>{{ $borrow->returned_at ?? 'Not Returned' }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
