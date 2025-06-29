<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@eduflash.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@eduflash.com',
            'password' => Hash::make('password'),
            'role' => 'editor'
        ]);
    }
}
