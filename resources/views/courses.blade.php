@extends('layouts.app')

@section('title', 'Courses | Pam England\'s Sculpture Studio')

@section('styles')
    <link href="{{ asset('assets/courses.css') }}" rel="stylesheet">
@endsection

@section('header')
    <h1>Our Courses</h1>
@endsection

@section('colorPicker')
    <!-- Color picker is included in this page -->
@endsection



@section('content')
<section class="course-list">
    <div class="center-btn-container">
        <button class="changeText-btn" onclick="changeTableTextStyle()">Change Text Style</button>
        <button class="resetText-btn" onclick="resetTableTextStyle()">Reset Text Style</button>
    </div>

    <!-- Form to Add a New Course -->
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" id="course_name" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="duration">Duration:</label>
            <input type="text" name="duration" id="duration" required>
        </div>

        <div>
            <label for="instructor">Instructor:</label>
            <input type="text" name="instructor" id="instructor" required>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>
        </div>

        <div>
            <label for="skill_level">Skill Level:</label>
            <input type="text" name="skill_level" id="skill_level" required>
        </div>

        <div>
            <label for="materials">Materials:</label>
            <input type="text" name="materials" id="materials" required>
        </div>

        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>

        <button type="submit">Add Course</button>
    </form>

    <table id="CourseTable">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Instructor</th>
                <th>Price</th>
                <th>Skill Level</th>
                <th>Materials</th>
                <th>Start Date</th>
                <th>Enroll</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->duration }}</td>
                <td>{{ $course->instructor }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->skill_level }}</td>
                <td>{{ $course->materials }}</td>
                <td>{{ $course->start_date }}</td>
                <td>
                    <button class="enroll-btn">Enroll Now</button>
                </td>
                <td>
                    <button class="details-btn" data-course="{{ $course->course_name }}">Show Details</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

<!-- Popup Modal -->
<div id="course-details-popup" class="popup hidden">
    <div class="popup-content">
        <button id="close-popup-btn" class="close-btn">Close</button>
        <h2 id="popup-course-name"></h2>
        <p id="popup-course-description"></p>
        <ul id="popup-course-details"></ul>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/courses.js') }}"></script>
@endsection