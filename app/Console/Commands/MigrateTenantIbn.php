<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Facades\Tenancy;

class MigrateTenantIbn extends Command
{
    protected $signature = 'tenant:migrate-ibn';
    protected $description = 'Run product migration for tenantibn only';


    public function handle()
    {
        $tenant = Tenant::where('id', 'ibn')->first(); // or match how you store IDs

        if (! $tenant) {
            $this->error('Tenant ibn not found.');
            return;
        }

        Tenancy::initialize($tenant); // switch DB

        Artisan::call('migrate', [
            '--path' => 'database/migrations/tenant/2025_06_02_185525_create_products_table_for_tenantibn.php',
            '--force' => true,
        ]);

        $this->info("✅ Migration run for tenantibn (products table)");
    }
}
