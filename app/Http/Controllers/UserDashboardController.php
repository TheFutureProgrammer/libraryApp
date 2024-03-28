<?php
namespace App\Http\Controllers;
use App\Models\Book;
// app/Http/Controllers/UserDashboardController.php
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Replace this with your actual logic to get books

        return view('userdashboard', ['books' => $books]);
    }
}
    