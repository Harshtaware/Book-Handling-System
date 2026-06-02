<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookApiController extends Controller
{
    
        public function index()
    {
        return response()->json(
            Book::all()
        );
    }

        public function show($id)
    {
        return response()->json(
            Book::findOrFail($id)
        );
    }

        public function store(Request $request)
    {
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'user_id' => 1
        ]);

        return response()->json($book);
    }

        public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update([
            'title'  => $request->title,
            'author' => $request->author,
            'price'  => $request->price
        ]);

        return response()->json([
            'message' => 'Book Updated',
            'book' => $book
        ]);
    }

        public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return response()->json([
            'message' => 'Book Deleted'
        ]);
    }
}
