<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author; 

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $publishers = Publisher::all(); // Menyediakan data penerbit
        return view('home', compact('books', 'publishers'));
    }

    public function store(Request $request)
    {
        $request->validate(Book::$rules);

        Book::create([
            'isbn' => $request->isbn,
            'name' => $request->nama,
            'year' => $request->tahun,
            'page' => $request->halaman,
            'author' => $request ->penulis,
            'publisher_id' => $request->penerbit,
        ]);

        return redirect()->route('home')->with('success','Buku berhasil ditambahkan.');
    }

    public function create()
    {
        $publishers = Publisher::all(); // Mengambil semua data penerbit
        return view('books.create', compact('publishers'));
    }
}
