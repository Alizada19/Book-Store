<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all()); exit;
         // 1️⃣ Validate input
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        // 2️⃣ Get the book price from DB
        $book = Book::findOrFail($request->book_id);
        
        // 3️⃣ Calculate total
        $total = $book->price * $request->quantity;

        // 4️⃣ Create order
        $order = Order::create([
            'userId' => auth()->id(),
            'totalAmount' => $total,
            'status' => 'pending',
        ]);
       
        // 5️⃣ Create order item
        OrderItem::create([
            'order_id' => $order->id,
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'price' => $book->price,
        ]);
        
        // 6️⃣ Redirect to order summary page
        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //DB::enableQueryLog();

        $order = Order::with('items.book.category')->findOrFail($id); 
        // If you only want the first book for single-book order
        $book = $order->items->first()->book; 
        //dd(DB::getQueryLog()); exit;
        return view('frontend.orders.show', compact('order', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('frontend.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'total_amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $order->update($request->all());

        return redirect()->route('frontend.orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
