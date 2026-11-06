<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'nama_pembeli',
        'total_harga',
        'detail_pesanan',
        'status',
        'completed_at'
    ];

    protected $casts = [
        'detail_pesanan' => 'array',
        'completed_at' => 'datetime'
    ];
}