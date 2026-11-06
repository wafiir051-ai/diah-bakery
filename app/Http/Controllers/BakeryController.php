<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BakeryController extends Controller
{
    public function index()
    {
        // Memanggil file resources/views/product_bakery.blade.php
        return view('product_bakery'); 
    }
}