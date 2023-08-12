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
        Schema::create('OrderItems', function (Blueprint $table) {
            $table->id('OrderItemID');
            $table->unsignedBigInteger('OrderID')->nullable();
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->integer('Quantity');
            $table->float('SubTotal');

            $table->foreign('OrderID')->references('OrderID')->on('Orders')->nullable();
            $table->foreign('ItemID')->references('ItemID')->on('MenuItems')->nullable();
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
