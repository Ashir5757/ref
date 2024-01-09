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
        Schema::create('networks', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('referral_code')->length(50);
            $table->unsignedBigInteger('user_id')->length(11);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('parent_user_id')->nullable()->length(11);
            $table->foreign('parent_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('networks');
    }
};
