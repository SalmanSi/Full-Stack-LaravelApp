<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    // Define the table name if it's not plural of the model
    protected $table = 'social_links';

    // Define the fields that can be mass assigned
    protected $fillable = ['platform', 'icon_path', 'url'];

    // Define the fields that should be hidden from array or JSON responses
    // (optional)
    protected $hidden = [];

    // If you want to handle the timestamps manually, you can disable it like this
    // public $timestamps = false;
}
