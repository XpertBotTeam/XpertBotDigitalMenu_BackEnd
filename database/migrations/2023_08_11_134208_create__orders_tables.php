<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\OrderStatus;
use App\Enums\DeliveryStatus;


// app/Enums/UserRole.php





return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->string('status')->default(OrderStatus::Pending);
            $table->timestamp('OrderDate')->nullable();
            $table->string('OrderTotal');
            $table->string('DeliveryInfo')->default(DeliveryStatus::Pending);
            $table->foreign('CustomerID')->references('CustomerID')->on('Customers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Orders');
    }
};
