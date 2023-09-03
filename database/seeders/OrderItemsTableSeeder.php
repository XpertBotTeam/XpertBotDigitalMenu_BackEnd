<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample order items
        OrderItem::create([
            'ItemID' => 1,
            'OrderID' => 1,
            'Quantity' => 2,
            'SubTotal' => 19.98,
        ]);

        OrderItem::create([
            'ItemID' => 2,
            'OrderID' => 2,
            'Quantity' => 3,
            'SubTotal' => 59.97,
        ]);

        // Add more order items as needed
    }
}
