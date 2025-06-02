<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
// dd('test');

Route::middleware([
    // InitializeTenancyByDomain::class,
    InitializeTenancyByPath::class,
    // PreventAccessFromCentralDomains::class,
])
    ->prefix('{tenant}')
    ->group(function () {
        Route::get('/', function () {
            return 'This is your multi-tenant application. The ID of the current tenant is ' . tenant('id');
        });
       
    });
