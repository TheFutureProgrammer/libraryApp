<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BorrowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//  Route::get('/', function (){
//      return view('welcome');
// });// routes/web.php



Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard');


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/index', [BookController::class, 'index']);

Route::get('/', [LoginController::class, 'index']);
Route::post('/check', [LoginController::class, 'check'])->name('check');

//Display the form to add a new book
Route::get('/create', [BookController::class, 'create'])->name('books.create');

//Handle the form submission for adding a new book
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books', [BookController::class, 'index'])->name('index');
Route::get('/create', [BookController::class, 'create'])->name('create');

// web.php

// Display the form to edit a book
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('edit');
Route::patch('/books/{book}/update', [BookController::class, 'update'])->name('update'); // Update route

// routes to delete a book
Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');


// Define your existing routes...

// Route::post('/borrow/{book}', [BorrowController::class, 'borrow'])->name('borrow');
Route::get('/borrowed-books', [BorrowController::class, 'indexBorrow'])->name('borrowed.index');

// Route to handle borrowing a book
Route::post('/borrow/{book}', [BorrowController::class, 'borrow'])->name('borrow');

// Route to handle returning a borrowed book
Route::post('/return/{book}', [BorrowController::class, 'returnBook'])->name('return');




