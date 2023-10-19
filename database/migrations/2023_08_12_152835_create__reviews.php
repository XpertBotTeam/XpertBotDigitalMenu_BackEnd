<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Rating;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID')->nullable();
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->string('Rating')->default(Rating::None);
            $table->string('Comment');
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->nullable();
            $table->foreign('ItemID')->references('id')->on('items')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
