<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Rating;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->string('ItemAvailability')->default(Rating::None);
            $table->string('Comment');

            $table->foreign('CustomerID')->references('CustomerID')->on('Customers')->nullable();
            $table->foreign('ItemID')->references('ItemID')->on('MenuItems')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Reviews');
    }
};
