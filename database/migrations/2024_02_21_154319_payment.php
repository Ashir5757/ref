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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('email')->required();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            // $table->string('payment_method')->nullable(); // Optional for future use
            // $table->decimal('amount', 10, 2)->required(); // Store exact amount with decimals
            // $table->string('transaction_id')->nullable(); // Optional for transaction reference
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
