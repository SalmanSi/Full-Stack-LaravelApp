@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container mt-5">
    <h1>Your Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>${{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <a href="#" class="btn btn-primary">Proceed to Checkout</a>
        </div>

    @else
        <p>Your cart is empty!</p>
    @endif

    <div class="mt-4">
        <a href="{{ route('shop') }}" class="btn btn-secondary">Continue Shopping</a>
    </div>
</div>
@endsection