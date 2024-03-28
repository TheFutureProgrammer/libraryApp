@extends('layouts.app')

@section('title', 'Book Library')


@section('content')  
<h1>LIBRARY SYSTEM</h1>
<div class="container mt-4">
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('borrowed.index') }}" class="btn btn-info mx-2">View Borrowed Books</a>
        <a href="/create" class="btn btn-primary mx-2">Add Book</a>
        <a href="/" class="btn btn-danger mx-2">Log out</a>
        <button class="btn btn-success mx-2" onclick="printPage()" style="min-width: 120px; height: 38px;">Print Page</button>
    </div>
    <!-- Your existing content -->
</div>


<div class="search-bar mb-3 text-center">
    <input type="text" id="searchInput" class="form-control mx-auto" placeholder="Search..." maxlength="15" style="max-width: 200px;">
</div>


    <table class="table table-bordered" id="booksTable">
        <thead>
            <tr>
                <th scope="col">IMAGE</th>
                <th scope="col">TITLE</th>
                <th scope="col">AUTHOR</th>
                <th scope="col">YEAR PUBLISHED</th>
                <th scope="col">ISBN</th>
                <th scope="col">COPIES AVAILABLE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td><img src="{{ asset('images/' . $book->image) }}" alt="Book Image"></td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->year_published}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->copies_available}}</td>
                <td>
                <form action="{{ route('destroy', ['book' => $book]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('edit', ['book' => $book]) }}" class="btn btn-primary">Edit Book</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                </form>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        var filter = this.value.toLowerCase();
        var rows = document.getElementById('booksTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var title = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
            var author = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
            var year = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();
            var isbn = rows[i].getElementsByTagName('td')[3].innerText.toLowerCase();
            var copies = rows[i].getElementsByTagName('td')[4].innerText.toLowerCase();

            if (title.includes(filter) || author.includes(filter) || year.includes(filter) || isbn.includes(filter) || copies.includes(filter)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    });

    function printPage() {
        window.print();
    }
</script>
@endsection
