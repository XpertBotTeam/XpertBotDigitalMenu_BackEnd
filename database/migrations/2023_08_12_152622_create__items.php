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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CategoryID')->nullable();
            $table->string('name');
            $table->float('price');
            $table->string('description');
            $table->string('ItemAvailability')->default(ItemAvailability::Available);
            $table->string('imageURL');
            $table->foreign('CategoryID')->references('id')->on('categories')->nullable();
            $table->timestamps();

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
