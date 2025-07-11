<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;      // adjust namespace if your model lives elsewhere

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'peverelli.t@gmail.com'],
            [
                'name'     => 'Site Admin',
                'password' => Hash::make('Alpha18star!'),
                'is_admin' => true,          // only if you have an is_admin boolean
                // 'role'  => 'admin',       // or adapt to your roles system
            ]
        );
    }
}
