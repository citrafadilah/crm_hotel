<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'nohp',
        'checkin',
        'checkout',
        'jmlh_kamar',
        'catatan',
        'status',
        'total',
        'updated_by',
    ];

    protected $table = 'reservasi';
    protected $primaryKey = 'id';

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
