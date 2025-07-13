<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Salsabila',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // User biasa
        User::create([
            'name' => 'salsa',
            'email' => 'salsa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
