<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeederForTenantIbn extends Seeder
{
    public function run()
    {
        DB::table('products_table_for_tenantibn')->insert([
            ['name' => 'Laptop', 'price' => 1500.00],
            ['name' => 'Phone', 'price' => 800.00],
            ['name' => 'Headphones', 'price' => 150.00],
        ]);
    }
}
