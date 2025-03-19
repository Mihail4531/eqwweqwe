<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.base', );

    }

    public function product()
    {
        $products = Product::where('is_active', true)->get();
        return view('layouts.base', [
            'products' => $products,
        ]);
    }
};
