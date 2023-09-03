<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        // Create some sample customers
        Customer::create([
            'Fname' => 'John',
            'Lname' => 'Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'phoneNb' => '1234567890',
            'address' => '123 Main Street',
        ]);

        Customer::create([
            'Fname' => 'Jane',
            'Lname' => 'Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password456'),
            'phoneNb' => '9876543210',
            'address' => '456 Elm Street',
        ]);

    }
}

