<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name follows Laravel's default naming convention)
    protected $table = 'comments';

    // Specify the columns that can be mass-assigned (for security reasons)
    protected $fillable = ['comment', 'author'];

    // If you want to add additional functionality or relationships, you can do so here
}
