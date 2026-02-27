<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $query = Category::orderBy('id', 'DESC');
                    
        // 2️⃣ Logged-in users
        if (Auth::check())
        {

            if (Auth::user()->can('View All')) {
                // Admin → see all books (no filter)

            } elseif (Auth::user()->can('View Record')) {
                // Seller → see only his own books
                $query->where('userId', Auth::id());
            }

        } 
        // 3️⃣ Guests (optional)
        else 
        {
            // Example:
            
        }
        $categories = $query->paginate(10);  // fetch users
        return view('frontend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('frontend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category=Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
            'userId' => auth()->id(),
        ]); 
       
        return redirect()
            ->route('categories.index')
            ->with('success', 'Category added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category deleted successfully.');
    }
}
