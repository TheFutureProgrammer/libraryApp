<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Replace this with your actual logic to get books
        return view('index', ['books' => $books]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9999',
            'title' => 'required|max:255',
            'author' => 'required',
            'year_published' => 'required|integer',
            'isbn' => 'required',
            'copies_available' => 'required|integer',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage; // Store only the file name, not the full path
        }

        Book::create($input);

        return redirect()->route('index')->with('success', 'Product created successfully.');
    }
    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }
    public function update(Request $request, Book $book)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9999',
            'title' => 'required|max:255',
            'author' => 'required',
            'year_published' => 'required|integer',
            'isbn' => 'required',
            'copies_available' => 'required|integer',
        ]);

        // Update book data
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->year_published = $request->input('year_published');
        $book->isbn = $request->input('isbn');
        $book->copies_available = $request->input('copies_available');

        // Update book image if a new one is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $book->image = $profileImage;
        }

        // Save the updated book
        $book->save();

        // Redirect to the index or show page after updating
        return redirect()->route('index')->with('success', 'Book updated successfully.');
    }
    public function destroy(Book $book)
    {
        // Delete the book
        $book->delete();
    
        // Redirect or return a response as needed
        return redirect()->route('index')->with('success', 'Book deleted successfully');
    }
    
}
