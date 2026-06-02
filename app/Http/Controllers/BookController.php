<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


          

        
        if(!session()->has('user_id'))
    {
        return redirect('/login');
    }

        $search = $request->search;

    $userId = session('user_id');

   $books = Book::where('user_id', $userId)
            ->where(function($query) use ($search){

                $query->where('title','LIKE',"%$search%")
                      ->orWhere('author','LIKE',"%$search%")
                      ->orWhere('price','LIKE',"%$search%");

            })
            ->paginate(5);

         $totalBooks = Book::count();

    $totalUsers = User::count();

    return view(
        'books.index',
        compact(
            'books',
            'totalBooks',
            'totalUsers'
        )
    );


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('books.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
         $request->validate([
            'title'=> 'required|min:3|max:100',
            'author'=> 'required|max:100',
            'price'=> 'required|numeric'
         ]);


          Book::create([
        'title'   => $request->title,
        'author'  => $request->author,
        'price'   => $request->price,
        'user_id' => session('user_id')
          ]);

        return redirect('/books')
                    ->with('success','Book Added Successfully');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
         return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

         $request->validate([
            'title'=> 'required|min:3|max:100',
            'author'=> 'required|max:100',
            'price'=> 'required|numeric'
         ]);

        $book->update($request->all());
        return redirect('/books');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //dd(1);
        $book->delete();

        return redirect('/books');
        //
    }

            public function trash()
        {
            $books = Book::onlyTrashed()->get();

            return view('books.trash',compact('books'));
        }

                public function restore($id)
        {
            Book::withTrashed()
                ->find($id)
                ->restore();

            return redirect('/trash');
        }

        public function forceDelete($id)
        {
            Book::withTrashed()
                ->find($id)
                ->forceDelete();

            return redirect('/trash');
        }
}
