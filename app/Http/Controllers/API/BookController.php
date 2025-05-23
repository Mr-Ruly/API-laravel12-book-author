<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;



class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json($book);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->update($request->all());
            return response()->json($book);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted']);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }
}

