<?php

namespace App\Services;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;



class AkijTenantSeederService
{

    public function teacher_seeder()
    {
        $data = [
            'name' => 'Amin'
        ];
        Teacher::create($data);
    }
    public function department_seeder()
    {
        DB::table('departments')->insert([
            'name' => 'English',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
