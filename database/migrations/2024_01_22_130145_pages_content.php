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

            for ($i = 1; $i <= 32; $i++) {
                $table->string("h$i")->nullable();
            }

            // images and video
            for ($i = 1; $i <= 3; $i++) {
                $table->string("image$i")->nullable();
            }
            $table->string('video')->nullable();

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
