<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/tenant/create',[TenantController::class,'tenantCreate'])->name('tenant.create');
    Route::post('/tenant/Store',[TenantController::class,'tenantStore'])->name('tenant.store');
    Route::get('/get/tenant', [TenantController::class, 'getTenant'])->name('get.tenant');
});

require __DIR__ . '/auth.php';
