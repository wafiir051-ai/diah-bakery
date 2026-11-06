<?php

    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kue extends Model
{
    protected $table = 'kue';
    
    protected $fillable = [
        'nama', 'rasa_kategori', 'harga', 'stock', 'deskripsi', 'foto'
    ];
}

