<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourse extends Model
{
    use HasFactory;

    // Specify the table name (if different from plural of model name)
    protected $table = 'new_courses';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'course_name',
        'description',
        'duration',
        'instructor',
        'price',
        'skill_level',
        'materials',
        'start_date',
    ];
}

