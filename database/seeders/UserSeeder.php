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
            'password' => Hash::make('superadmin123'),
            'role' => 'admin',
            'hp' => '081292957700',
        ]);

        User::create([
            'name' => 'Citra Fadilah Hasibuan',
            'email' => 'citra@gmail.com',
            'password' => Hash::make('citra123'),
            'role' => 'admin',
            'hp' => '081279756133',
        ]);

        User::create([
            'name' => 'Grace Patricia',
            'email' => 'grace@gmail.com',
            'password' => Hash::make('grace123'),
            'role' => 'admin',
            'hp' => '0895621551301',
        ]);

        User::create([
            'name' => 'Surya Dharma',
            'email' => 'surya@gmail.com',
            'password' => Hash::make('surya123'),
            'role' => 'user',
            'hp' => '082311826827',
        ]);
    }
}
