<?php

namespace Database\Seeders\tenant;

use App\Services\TenantSeederService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private TenantSeederService $tenant_seeder_service;

    public function __construct(TenantSeederService $tenant_seeder_service)
    {
        $this->tenant_seeder_service = $tenant_seeder_service;
    }

    public function run(): void
    {
        $this->tenant_seeder_service->create_tenant();
    }
}
