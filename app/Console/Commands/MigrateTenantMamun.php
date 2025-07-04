<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Facades\Tenancy;

class MigrateTenantMamun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'tenant:migrate-mamun';
    protected $signature = 'tenant:migrate {tenant_id}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenantId = $this->argument('tenant_id');

        $tenant = Tenant::where('id', $tenantId)->first();


        if (! $tenant) {
            $this->error('Tenant not found.');
            return;
        }

        Tenancy::initialize($tenant); // Activates the tenant's database connection

        Artisan::call('migrate', [
            // '--path' => 'database/migrations/tenant', // ✅ relative path without slash
            '--path' => 'database/migrations/customTenantMigration', // ✅ relative path without slash
            '--force' => true,
        ]);

        $this->info("Migration run for tenantmamun");
    }
}
