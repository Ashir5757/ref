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
        Schema::create('pages_contents', function (Blueprint $table) {
            $table->id();

            $table->string('h1')->nullable();
            $table->string('h2')->nullable();
            $table->string('h3')->nullable();
            $table->string('h4')->nullable();
            $table->string('h5')->nullable();
            $table->string('h6')->nullable();
            $table->string('h7')->nullable();
            $table->string('h8')->nullable();
            $table->string('h9')->nullable();
            $table->string('h10')->nullable();
            $table->string('h11')->nullable();
            $table->string('h12')->nullable();
            $table->string('h13')->nullable();
            $table->string('h14')->nullable();
            $table->string('h15')->nullable();
            $table->string('h16')->nullable();
            $table->string('h17')->nullable();
            $table->string('h18')->nullable();
            $table->string('h19')->nullable();
            $table->string('h20')->nullable();
            $table->string('h21')->nullable();
            $table->string('h22')->nullable();
            $table->string('h23')->nullable();
            $table->string('h24')->nullable();
            $table->string('h25')->nullable();
            $table->string('h26')->nullable();
            $table->string('h27')->nullable();
            $table->string('h28')->nullable();
            $table->string('h29')->nullable();
            $table->string('h30')->nullable();
            $table->string('h31')->nullable();
            $table->string('h32')->nullable();
            // images and video
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('video')->required();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
