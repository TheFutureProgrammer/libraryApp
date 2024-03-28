<?php

// app/Http/Controllers/BorrowController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB; // Import the DB facade

class BorrowController extends Controller
{
    /**
     * Borrow a book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function indexBorrow()
    {
       $borrows = Borrow::all();    
       return view("borrow.index", compact("borrows"));
    }
    

    /**
     * Borrow a book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function borrow(Request $request, Book $book)
    {
        $user = auth()->user();

        // Check if the book is already borrowed
        if ($book->isBorrowed()) {
            return redirect()->back()->with('error', 'This book is already borrowed.');
        }

        // Use a transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Borrow the book
            $user->books()->attach($book, ['borrowed_at' => now()]);

            // Decrement the copies_available column
            $book->decrement('copies_available');

            DB::commit();

            return redirect()->back()->with('success', 'Book borrowed successfully.');
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to borrow the book. Please try again.');
        }

    }
    /**
     * Return a borrowed book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function returnBook(Request $request, Book $book)
    {
        $user = auth()->user();
    
        // Check if the user has borrowed the book
        $borrow = $user->books()->where('book_id', $book->id)
                        ->whereNotNull('borrowed_at')
                        ->whereNull('returned_at')
                        ->first();
    
        if (!$borrow) {
            return redirect()->back()->with('error', 'You have not borrowed this book or it has already been returned.');
        }
    
        // Check if the book has already been returned
        if ($borrow->returned_at) {
            return redirect()->back()->with('error', 'This book has already been returned.');
        }
    
        // Update the returned_at column in the pivot table
        $user->books()->updateExistingPivot($book->id, ['returned_at' => now()]);
    
        // Increment the copies_available column
        $book->increment('copies_available');
    
        return redirect()->back()->with('success', 'Book returned successfully.');
    }
}    