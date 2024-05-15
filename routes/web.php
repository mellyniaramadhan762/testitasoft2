<?php


use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('web');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('web');

Route::resource('books', 'BookController')->middleware('web');
Route::resource('publishers', 'PublisherController')->middleware('web');

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('web');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('web');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::apiResource('publishers', PublisherController::class)->middleware('web');

// CRUD Routes for BookController
Route::get('/books', [BookController::class, 'index'])->name('books.index')->middleware('web');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('web');
Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware('web');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show')->middleware('web');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('web');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update')->middleware('web');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('web');
Route::get('/books/{book}/delete', [BookController::class, 'delete'])->name('books.delete')->middleware('web');


// CRUD Routes for PublisherController
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index')->middleware('web');
Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create')->middleware('web');
Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store')->middleware('web');
Route::get('/publishers/{publisher}', [PublisherController::class, 'show'])->name('publishers.show')->middleware('web');
Route::get('/publishers/{publisher}/edit', [PublisherController::class, 'edit'])->name('publishers.edit')->middleware('web');
Route::put('/publishers/{publisher}', [PublisherController::class, 'update'])->name('publishers.update')->middleware('web');
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy'])->name('publishers.destroy')->middleware('web');
Route::get('/publishers/{publisher}/delete', [PublisherController::class, 'delete'])->name('publishers.delete')->middleware('web');
