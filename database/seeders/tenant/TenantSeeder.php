<?php

namespace Database\Seeders\tenant;

use App\Services\TenantSeederService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{

    public TenantSeederService $tenant_seeder_service;

    /**
     * Run the database seeds.
     */

    public function __construct()
    {
        $this->tenant_seeder_service = new TenantSeederService();
    }

    public function run(): void
    {
        $this->tenant_seeder_service->create_tenant();
    }
}
