<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <10 ; $i++) { 
            User::create([
                'name' => fake()->unique()->name,
                'email' => fake()->unique()->email,
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
