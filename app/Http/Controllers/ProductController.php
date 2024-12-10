<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    
   

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|file|image|max:2048', // Validate the file
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        // Store the image and get the path
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product = Product::create([
        'name' => $validated['name'],
        'price' => $validated['price'],
        'image' => $imagePath, // Save the file path
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Product added successfully!',
        'product' => $product,
    ]);
}


public function addToCart(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Fetch the product
    $product = Product::find($validated['product_id']);

    // Create a cart entry (session or database-based)
    $cart = session()->get('cart', []);

    $cart[$product->id] = [
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => $validated['quantity'],
        'image' => $product->image,
    ];

    session()->put('cart', $cart);

    return response()->json(['success' => true, 'message' => 'Product added to cart']);
}


}