<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';

    protected $fillable = [
        'name',
        'email',
        'hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
