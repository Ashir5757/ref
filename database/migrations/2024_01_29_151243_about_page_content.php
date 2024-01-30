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
        Schema::create('about_page_content', function (Blueprint $table) {
            $table->id();
            $table->string('h1');
            $table->string('h2');
            $table->string('image1')->nullable();
            $table->string('h3');
            $table->string('h4');
            $table->string('h5');
            $table->string('h6');
            $table->string('h7');
            $table->string('h8');
            $table->string('h9');
            $table->string('h10');
            $table->string('h11');
            $table->string('h12');
            $table->string('image2')->nullable();
            $table->string('h13');
            $table->string('h14');
            $table->string('h15');
            $table->string('h16');
            $table->string('h17');
            $table->string('h18');
            $table->string('h19');
            $table->string('h20');
            $table->string('h21');
            $table->string('h22');
            $table->string('image3')->nullable();
            $table->string('h23');
            $table->string('video');
            $table->string('h24');
            $table->string('h25');
            $table->string('h26');
            $table->string('h27');
            $table->string('h28');
            $table->string('h29');
            $table->string('h30');
            $table->string('h31');
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
