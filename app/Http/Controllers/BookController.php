<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Book::with(['seller', 'category'])->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.books.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('frontend.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $book=Book::create([
            'seller_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]); 

        // Upload cover using Spatie Media Library
        if ($request->hasFile('cover')) {
            $book->addMediaFromRequest('cover')
                ->toMediaCollection('covers');
        }

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('frontend.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
