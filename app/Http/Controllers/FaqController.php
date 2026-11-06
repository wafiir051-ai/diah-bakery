<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Menampilkan view FAQ
        return view('faq');
    }
    
    // Bisa tambahkan method lain nanti jika diperlukan
    // misalnya untuk kategori FAQ dinamis dari database
}