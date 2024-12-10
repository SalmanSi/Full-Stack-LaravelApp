@extends('layouts.app')

@section('title', 'Welcome | Pam England\'s Sculpture Studio')

@section('content')
<div class="container">
    <section class="shop-section">
        <h2>Shop Sculptures</h2>
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <h3>{{ $product->name }}</h3>
                    <p>Price: ${{ $product->price }}</p>
                    <div class="product-actions">
                        <label for="quantity-{{ $product->id }}">Quantity:</label>
                        <input type="number" id="quantity-{{ $product->id }}" min="1" value="1">
                        <button class="add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="add-product-section">
        <h2>Add New Sculpture</h2>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-actions">
                <button type="submit">Add Item</button>
                <button type="button" class="close-btn">Close</button>
            </div>
        </form>

        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>

    <div class="additional-actions">
        <button class="btn add-sculpture-btn">Add New Sculpture</button>
        <button class="btn remove-last-item-btn">Remove Last Item</button>
    </div>
</div>
@endsection