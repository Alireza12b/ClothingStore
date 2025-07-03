<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['variants.color', 'variants.size'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function index(Request $request)
    {
        $query = Product::with(['category', 'variants']);

        if ($search = $request->query('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        return view('products.products', compact('products'));
    }
}
