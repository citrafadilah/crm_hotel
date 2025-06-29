<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Room::create([
            'jeniskamar' => 'Smart Room Double',
            'harga' => 600000,
            'jmlhorang' => 2,
            'catatan' => 'Room Only',
            'jmlhkamar' => 20,
        ]);
        Room::create([
            'jeniskamar' => 'Smart Room Twin',
            'harga' => 600000,
            'jmlhorang' => 2,
            'catatan' => 'Room Only',
            'jmlhkamar' => 15,
        ]);
        Room::create([
            'jeniskamar' => 'Smart Room Double',
            'harga' => 650000,
            'jmlhorang' => 2,
            'catatan' => 'Include breakfast for 2 pax',
            'jmlhkamar' => 20,
        ]);
        Room::create([
            'jeniskamar' => 'Smart Room Twin',
            'harga' => 650000,
            'jmlhorang' => 2,
            'catatan' => 'Include breakfast for 2 pax',
            'jmlhkamar' => 15,
        ]);
    }
}
