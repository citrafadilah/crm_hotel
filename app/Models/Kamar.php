<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';

    protected $fillable = [
        'jeniskamar',
        'harga',
        'jmlhorang',
        'catatan',
        'jmlhkamar',
    ];
}
