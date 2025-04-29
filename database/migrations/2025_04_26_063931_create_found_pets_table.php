<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('found_pets', function (Blueprint $table) {
            $table->id();
            $table->string('pet_type');
            $table->string('other_pet_type')->nullable();
            $table->string('breed')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('location');
            $table->date('found_date');
            $table->text('description')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_pets');
    }
};
