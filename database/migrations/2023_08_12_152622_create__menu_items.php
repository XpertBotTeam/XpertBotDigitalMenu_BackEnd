<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ItemAvailability;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('MenuItems', function (Blueprint $table) {
            $table->id('ItemID');
            $table->unsignedBigInteger('CategoryID')->nullable();
            $table->string('ItemName');
            $table->float('ItemPrice');
            $table->string('ItemDescription');
            $table->string('ItemAvailability')->default(ItemAvailability::Available);
            $table->string('ImageUrl');
            $table->foreign('CategoryID')->references('CategoryID')->on('categories')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ManuItems');
    }
};
