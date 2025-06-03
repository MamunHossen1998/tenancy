<?php

namespace Database\Seeders;

use Database\Seeders\customTenantSeeder\DepartmentSeeder;
use Database\Seeders\customTenantSeeder\TeacherSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkijDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            TeacherSeeder::class
        ]);
    }
}
