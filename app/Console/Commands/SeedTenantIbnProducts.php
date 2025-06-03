<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Facades\Tenancy;

class SeedTenantIbnProducts extends Command
{
    protected $signature = 'tenant:seed-ibn-products';
    protected $description = 'Seed products table for tenantibn only';

    public function handle()
    {
        $tenant = Tenant::where('id', 'labaid')->first();

        if (! $tenant) {
            $this->error('Tenant ibn not found.');
            return;
        }

        Tenancy::initialize($tenant); // switch to tenantibn's DB

        // Run the seeder
        Artisan::call('db:seed', [
            '--class' => 'ProductSeederForTenantIbn',
            '--force' => true,
        ]);

        $this->info("✅ Seeded products table for tenantibn.");
    }
}
