<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Kue::all();
        return view('products.index', compact('products'));
    }
}
