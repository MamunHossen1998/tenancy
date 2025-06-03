<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class TenantSeederService
{
    public function create_tenant()
    {
        $data = [
            'id' => 'mamun',
            'trace' => 'mamun trace',
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
        ];
        Tenant::create($data);
    }
}
