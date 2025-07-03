<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest('updated_at')->take(4)->get();
        $categories = Category::withCount('products')->get();
        return view('welcome', compact('latestProducts', 'categories'));
    }
}
