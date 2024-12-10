<?php

namespace App\Http\Controllers;

use App\Models\NewCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   
   
    // Store the course data in the database
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'price' => 'required|string',
            'skill_level' => 'required|string',
            'materials' => 'required|string',
            'start_date' => 'required|date',
        ]);

        // Create a new course record
        NewCourse::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    // Display all courses
    
    public function index()
{
    $courses = NewCourse::all(); // Get all courses from the database
    return view('courses', compact('courses')); // Use your actual view path
}
 // Show the course form
 public function showForm()
 {
     return view('create'); // Form view for adding new courses
 }
 

}
