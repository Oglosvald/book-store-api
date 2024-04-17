<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookValidation;
class BookController extends Controller
{
    public function index()
    {
        try{
            $books = Book::all();
            return response()->json($books, 200);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    public function show($id)
    {
        try{       
            $book = Book::findOrFail($id);
            return response()->json($book, 200);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    public function store(BookValidation $request)
    {
        try {
            $book = Book::create($request->all());
            return response()->json($book, 201);
        } catch(Exception $e) {
            return response()->json($e);
        }

        
    }

    public function update(BookValidation $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($request->all());
    
            return response()->json($book, 200);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    public function destroy($id)
    {
        try{
            $book = Book::findOrFail($id);
            $book->delete();

            return response()->json(null, 204);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }
}
