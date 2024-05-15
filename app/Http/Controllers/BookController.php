<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param  Model $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->model = $book;
    }
    
    public function index()
    {
        $books = Book::with('publisher')->get();
        return view('home', compact('books'));
    }
    /*public function create()
    {
        $publishers = Publisher::all(); // Fetch all publishers
        return view('books.create', compact('publishers'));
    }*/

    public function create()
    {
        $books = book::all(); // Fetch all publishers
        return view('books.create', compact('books'));
    }

    public function store(BookRequest $request)
    {
        return (new BookResource(Book::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $item = $this->model->with('publisher')->findOrFail($id);
            return response(['data' => $item, 'status' => 200]);
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $item = $this->model->with('publisher')->findOrFail($id);
            $item->update($request->all());

            return redirect()->route('home');
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = $this->model->with('publisher')->findOrFail($id);
            $item->delete();
            return redirect()->route('home');
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    /**
     * Show the delete confirmation page.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        return view('books.delete', compact('book'));
    }
}
