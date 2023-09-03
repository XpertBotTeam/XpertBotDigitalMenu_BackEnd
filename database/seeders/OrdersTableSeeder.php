<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orders;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample orders
        Orders::create([
            'status' => 'Processing',
            'DeliveryInfo' => '123 Main Street, City, Country',
            'CustomerID' => 1,
        ]);

        Orders::create([
            'status' => 'Shipped',
            'DeliveryInfo' => '456 Elm Street, Town, Country',
            'CustomerID' => 2,
        ]);

        // Add more orders as needed
    }
}
