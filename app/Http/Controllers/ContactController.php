<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|size:11',
            'favourite_product' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the validated data to the database
        ContactSubmission::create($validated);

        // Redirect with success message
        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}
