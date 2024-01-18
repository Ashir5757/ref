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
            $table->string('image')->nullable(); // Assuming image can be nul                                                                                                                                                                                                                                                                               lable
            $table->text('about')->nullable(); // Using text for longer descriptions
            $table->string('cnic')->unique(); // Assuming CNIC is unique
            $table->string('country');
            $table->string('address'); // Corrected the typo in 'Address'
            $table->string('phone');
            $table->string('twitter')->nullable(); // Assuming profiles can be nullable
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable(); // Corrected the typo in 'LinkedIn'
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
