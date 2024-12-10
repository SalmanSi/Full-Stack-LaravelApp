<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sculpture extends Model
{
    use HasFactory;

    // Define the table name if it is different from the plural of the model
    protected $table = 'sculptures';

    // Define the fields that can be mass-assigned
    protected $fillable = ['name', 'type', 'description', 'price', 'image_path'];

    // Define the fields that should be hidden from array or JSON responses (optional)
    protected $hidden = [];

    // If you want to handle the timestamps manually, you can disable it like this
    // public $timestamps = false;
}
