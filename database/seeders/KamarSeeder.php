<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kamar::create([
            'jeniskamar' => 'Smart Kamar Double',
            'harga' => 600000,
            'jmlhorang' => 2,
            'catatan' => 'Kamar Only',
            'jmlhkamar' => 20,
        ]);
        Kamar::create([
            'jeniskamar' => 'Smart Kamar Twin',
            'harga' => 600000,
            'jmlhorang' => 2,
            'catatan' => 'Kamar Only',
            'jmlhkamar' => 15,
        ]);
        Kamar::create([
            'jeniskamar' => 'Smart Kamar Double',
            'harga' => 650000,
            'jmlhorang' => 2,
            'catatan' => 'Include breakfast for 2 pax',
            'jmlhkamar' => 20,
        ]);
        Kamar::create([
            'jeniskamar' => 'Smart Kamar Twin',
            'harga' => 650000,
            'jmlhorang' => 2,
            'catatan' => 'Include breakfast for 2 pax',
            'jmlhkamar' => 15,
        ]);
    }
}
