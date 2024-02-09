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
            Schema::create('contact_page', function (Blueprint $table) {
                $table->id();
                $table->string('h1');
                $table->string('h2');
                $table->string('h3');
                $table->string('h4');
                $table->string('image1')->nullable();
                // Add any additional fields you need for your contact page

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
