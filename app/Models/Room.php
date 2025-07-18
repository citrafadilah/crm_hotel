<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';

    protected $fillable = [
        'jeniskamar',
        'harga',
        'jmlhorang',
        'catatan',
        'jmlhkamar',
    ];
}
