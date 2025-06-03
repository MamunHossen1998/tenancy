<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Facades\Tenancy;

class SeedAkijTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'tenant:seed-akij';
    protected $signature = 'tenant:seed {tenant_id}';
    // protected $signature = 'tenant:migrate-akij';

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

        $tenant = Tenant::where('id', $tenantId)->first();// Make sure 'mamun' is the correct tenant ID

        if (! $tenant) {
            $this->error('Tenant not found.');
            return;
        }

        Tenancy::initialize($tenant); // Activates the tenant's database connection

        // Run the seeder
        Artisan::call('db:seed', [
            '--class' => 'AkijDatabaseSeeder',
            '--force' => true,
        ]);

        // Artisan::call('migrate', [
        //     '--path' => 'database/migrations/customTenantMigration', // ✅ relative path without slash
        //     '--force' => true,
        // ]);

        $this->info("Migration run for tenantakij");
    }
}
