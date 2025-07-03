<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $query = $category->products()->with('variants');

        if ($search = $request->query('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        return view('products.products', compact('products', 'category'));
    }
}
