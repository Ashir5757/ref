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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Image can be nullable
            $table->text('about')->nullable(); // For longer descriptions
            $table->string('cnic')->unique(); // CNIC must be unique
            $table->string('country');
            $table->string('address');
            $table->string('phone');
            $table->string('twitter')->nullable(); // Social profiles can be nullable
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
