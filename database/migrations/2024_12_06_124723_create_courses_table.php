<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            // Defining columns for the new table
            $table->id(); // Primary key
            $table->string('course_name'); // Course name
            $table->text('description'); // Course description
            $table->text('duration'); // Course duration
            $table->string('instructor'); // Instructor name
            $table->text('price'); // Course price
            $table->string('skill_level'); // Skill level required
            $table->text('materials'); // Course materials
            $table->date('start_date'); // Course start date
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses'); // Drops the table when rolling back
    }
};
