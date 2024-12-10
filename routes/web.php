<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home');
});


Route::view('/courses', 'courses');
Route::view('/shop', 'shop');
Route::view('/contact', 'contact');
Route::view('/home', 'home');


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');




Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'showForm'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');






Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::post('/shop/add-to-cart', [ProductController::class, 'addToCart'])->name('shop.addToCart');
Route::get('/shop/cart', [ProductController::class, 'viewCart'])->name('shop.viewCart');


// routes/web.php



// Route to display products (GET request)
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

// Route to store a new product (POST request)
Route::post('/shop', [ProductController::class, 'store'])->name('product.store');




// // Route to view the cart
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// // Route to add a product to the cart
// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// // Route to remove a product from the cart
// Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');




Route::get('/shop', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('cart.add');



