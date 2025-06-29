<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'palembang.reservasion@hayohotels.com',
            'password' => Hash::make('superadmin123'), // Ganti dengan password yang lebih aman
            'role' => 'admin',
            'hp' => '081292957700',
        ]);

        User::create([
            'name' => 'Admin Hotel',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Ganti dengan password yang lebih aman
            'role' => 'admin',
            'hp' => '08987654321',
        ]);

        User::create([
            'name' => 'Pengguna Customer',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'), // Ganti dengan password yang lebih aman
            'role' => 'user',
            'hp' => '08123456789',
        ]);
    }
}
