<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // فهرست
    public function index(Request $request)
    {
        $products = Product::with(['category', 'variants'])
            ->when($request->search, function ($q, $s) {
                $q->where('name', 'like', "%$s%");
            })
            ->latest()->paginate(10);

        return view('admin.products', [
            'products' => $products,
            'categories' => \App\Models\Category::all(),
            'colors' => \App\Models\Color::all(),
            'sizes' => \App\Models\Size::all(),
        ]);
    }

    // دیتا برای مودال ویرایش (json)
    public function showJson(Product $product)
    {
        $product->load(['variants']);
        return response()->json($product);
    }

    // بروزرسانی محصول و واریانت‌ها
    public function update(Request $req, Product $product)
    {
        $req->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'variants.price.*' => 'required|numeric|min:0',
            'variants.quantity.*' => 'required|integer|min:0',
        ]);

        $product->update($req->only('name', 'description', 'category_id'));

        // sync variants
        $ids = $req->input('variants.id', []);
        foreach ($req->variants['price'] as $idx => $price) {
            $data = [
                'color_id' => $req->variants['color_id'][$idx],
                'size_id' => $req->variants['size_id'][$idx],
                'price' => $price,
                'quantity' => $req->variants['quantity'][$idx],
            ];
            if ($ids[$idx]) {
                ProductVariant::where('id', $ids[$idx])->update($data);
            } else {
                $product->variants()->create($data);
            }
        }
        // حذف واریانت‌هایی که کاربر بر‌داشته
        $product->variants()->whereNotIn('id', array_filter($ids))->delete();

        return redirect()->back()->with('success', 'محصول ذخیره شد');
    }

    // حذف محصول
    public function destroy(Product $product)
    {
        $product->variants()->delete();
        $product->delete();
        return redirect()->back()->with('success', 'محصول حذف شد');
    }
}
