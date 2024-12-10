@extends('layouts.app')

@section('title', 'Shop | Pam England\'s Sculpture Studio')

@section('styles')
    <link href="{{ asset('assets/shop.css') }}" rel="stylesheet">
@endsection

@section('header')

        <h1>Shop Sculptures</h1>

@endsection

@section('content')
    <main>
        <section class="product-list">
            @foreach($products as $product)
                <div class="product">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>Price: ${{ $product->price }}</p>
                    <label for="quantity{{ $product->id }}">Quantity:</label>
                    <input type="number" id="quantity{{ $product->id }}" name="quantity{{ $product->id }}" min="1" value="1">
                    <button class="add-to-cart" data-product-id="{{ $product->id }}">Add to Cart</button>
                </div>
            @endforeach
        </section>

        <div id="item-popup" class="popup-form">
            <div class="popup-content add-item-form">
                <h2>Add New Sculpture</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="item-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="1" step="0.01" required><br>

                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required><br>

                    <button type="submit">Add Item</button>
                    <button type="button" id="close-popup-btn">Close</button>
                </form>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <section class="dynamic-list-controls">
            <button id="open-form-btn">Add New Sculpture</button>
            <button id="remove-item-btn">Remove Last Item</button>
        </section>
    </main>
@endsection



@section('scripts')
    <script src="{{ asset('assets/shop.js') }}"></script>
@endsection
