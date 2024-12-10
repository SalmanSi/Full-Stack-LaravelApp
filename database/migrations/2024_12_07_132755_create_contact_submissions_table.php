<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name field
            $table->string('email'); // Email field
            $table->string('phone_number', 11)->nullable(); // Phone number (optional)
            $table->string('favourite_product')->nullable(); // Favourite product
            $table->text('message'); // Message field
            $table->timestamps(); // created_at and updated_at columns
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
