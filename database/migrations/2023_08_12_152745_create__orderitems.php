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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('OrderID')->nullable();
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->integer('Quantity');
            $table->float('SubTotal');
            $table->timestamps();

            $table->foreign('OrderID')->references('id')->on('orders')->nullable();
            $table->foreign('ItemID')->references('id')->on('items')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OrderItems');
    }
};
