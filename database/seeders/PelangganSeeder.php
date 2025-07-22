<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pelanggan::create([
            'name' => 'Citra F',
            'email' => 'citra1@gmail.com',
            'hp' => '081234567890',
        ]);
    }
}
