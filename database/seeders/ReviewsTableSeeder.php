<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample reviews
        Review::create([
            'Comment' => 'This is a great product!',
            'UserID' => 1,
            'ItemID' => 1,
            'Rating' => 5,
        ]);

        Review::create([
            'Comment' => 'Good product, but could be better.',
            'UserID' => 2,
            'ItemID' => 2,
            'Rating' => 3,
        ]);

        // Add more reviews as needed
    }
}
