<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublisherController extends Controller
{
    protected $model;

    public function __construct(Publisher $publisher)
    {
        $this->model = $publisher;
    }

    public function index()
    {
        $publishers = Publisher::all();
        $books = Book::all();
        return view('home', compact('publishers', 'books'));
    }

    public function create()
    {
        $publishers = Publisher::all();
        return view('publishers.create', compact('publishers'));
    }

    public function store(PublishRequest $request)
    {
        return (new BookResource(Book::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            $item->delete();
            return $this->index();
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    public function show($id)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            return response(['data' => $item, 'status' => 200]);
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            $item->update($request->all());
            return response(['data' => $item, 'status' => 200]);
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }
}
