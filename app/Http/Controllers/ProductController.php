<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['variants.color', 'variants.size'])->findOrFail($id);
        return view('products.show', compact('product'));
    }
}
