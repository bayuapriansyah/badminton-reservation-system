<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'user_id',
        'lapangan_id',
        'lapangan',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lama_sewa',
        'total_harga',
        'status',
    ];
}
