<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample items
        Item::create([
            'name' => 'Item 1',
            'price' => 9.99,
            'CategoryID' =>1,
            'description' => 'This is item 1 description.',
            'imageURL' => 'Untitled.jpeg',
            'ItemAvailability' => true,
        ]);

        Item::create([
            'name' => 'Item 2',
            'price' => 19.99,
            'CategoryID' =>1,
            'description' => 'This is item 2 description.',
            'imageURL' => 'Untitled.jpeg',
            'ItemAvailability' => false,
        ]);

        // Add more items as needed
    }
}
