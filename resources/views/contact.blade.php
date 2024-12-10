@extends('layouts.app')

@section('title', 'Contact | Pam England\'s Sculpture Studio')

@section('styles')
    <link href="{{ asset('assets/contact.css') }}" rel="stylesheet">
@endsection

@section('header')
    <h1>Contact Us</h1>
@endsection

@section('content')
<section class="contact-form">
    <h2>Get in Touch</h2>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" placeholder="First & Last names" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Email Field -->
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" placeholder="abc@xyz.com" required>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Phone Number Field -->
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phone_number" placeholder="03xxxxxxxxx" maxlength="11" minlength="11">
        @error('phone_number')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Favourite Product Field -->
        <label for="favourite-product">Favourite Product:</label>
        <select name="favourite_product" id="favourite-product">
            <option value="">Select your favorite product</option>
            <option value="Handmade Clay Sculpture">Handmade Clay Sculpture</option>
            <option value="Modern Art Sculpture">Modern Art Sculpture</option>
            <option value="Abstract Bronze Sculpture">Abstract Bronze Sculpture</option>
            <option value="Minimalist Marble Sculpture">Minimalist Marble Sculpture</option>
            <option value="Wooden Carved Sculpture">Wooden Carved Sculpture</option>
            <option value="Glass Blown Sculpture">Glass Blown Sculpture</option>
        </select>
        @error('favourite_product')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Message Field -->
        <label for="message">Your Message:</label>
        <textarea name="message" id="message" placeholder="Your Message" required></textarea>
        @error('message')
            <div class="error">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit">Send Message</button>
    </form>

    <!-- Success Message (if needed) -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
</section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/contact.js') }}"></script>
@endsection