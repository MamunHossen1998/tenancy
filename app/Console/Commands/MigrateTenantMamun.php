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
    protected $signature = 'tenant:migrate-mamun';

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
        $tenant = Tenant::where('id', 'mamun')->first(); // Make sure 'mamun' is the correct tenant ID

        if (! $tenant) {
            $this->error('Tenant not found.');
            return;
        }

        Tenancy::initialize($tenant); // Activates the tenant's database connection

        Artisan::call('migrate', [
            '--path' => 'database/migrations/tenant', // ✅ relative path without slash
            '--force' => true,
        ]);

        $this->info("Migration run for tenantmamun");
    }
}
