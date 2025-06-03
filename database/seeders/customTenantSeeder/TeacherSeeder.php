<?php

namespace Database\Seeders\customTenantSeeder;

use App\Services\AkijTenantSeederService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public AkijTenantSeederService $akij_tenant_seeder_service;

    /**
     * Run the database seeds.
     */

    public function __construct()
    {
        $this->akij_tenant_seeder_service = new AkijTenantSeederService();
    }

    public function run(): void
    {
        $this->akij_tenant_seeder_service->teacher_seeder();
    }
}
