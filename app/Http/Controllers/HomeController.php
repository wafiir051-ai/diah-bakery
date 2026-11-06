<?php

namespace App\Http\Controllers;

use App\Models\Kue;

class HomeController extends Controller
{
    public function index()
    {
        $products = Kue::all();
        return view('home.index', compact('products'));
    }
}
