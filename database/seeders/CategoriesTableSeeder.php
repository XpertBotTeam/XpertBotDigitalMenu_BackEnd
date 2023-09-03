<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample categories
        Category::create([
            'CategoryName' => 'Category 1',
        ]);

        Category::create([
            'CategoryName' => 'Category 2',
        ]);

        // Add more categories as needed
    }
}
