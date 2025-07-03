<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with(['products' => function ($query) {
            $query->latest()->paginate(12);
        }])->findOrFail($id);
        $products = $category->products()->latest()->paginate(12);

        return view('products.products', compact('products', 'category'));
    }
}
