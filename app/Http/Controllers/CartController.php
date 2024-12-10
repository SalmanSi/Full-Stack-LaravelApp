<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show the contents of the cart
    // public function index()
    // {
    //     // Retrieve the cart data from the session
    //     $cart = session()->get('cart', []);

    //     return view('cart.index', compact('cart'));
    // }

    public function index()
{
    // Retrieve all products, paginated
    $products = Product::paginate(9); // 9 products per page
    return view('card', compact('products'));
}


    // Add a product to the cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Get the cart data from the session, or initialize it if it doesn't exist
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            // Increment the quantity if the product is already in the cart
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart with an initial quantity of 1
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        // Update the cart session
        session()->put('cart', $cart);

        // Redirect to the shop page with a success message
        return redirect()->route('shop.index')->with('success', 'Product added to cart!');
    }

    // Remove a product from the cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        // Check if the product is in the cart and remove it
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }


    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        // If the cart contains the product
        if (isset($cart[$productId])) {
            // Remove the product from the cart
            unset($cart[$productId]);

            // Save the updated cart back to the session
            session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
        }

        return redirect()->route('cart.show')->with('error', 'Product not found in cart!');
    }
}
