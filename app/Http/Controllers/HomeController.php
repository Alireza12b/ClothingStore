<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(4)->get();
        return view('welcome', compact('latestProducts'));
    }
}
