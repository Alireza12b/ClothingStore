<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Traits\ProductImagesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    use ProductImagesHelper;

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

    public function showJson(Product $product)
    {
        $product->load(['variants']);
        return response()->json($product);
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => ['nullable', Rule::exists('categories', 'id')],
            'image'       => 'nullable|image|max:2048',

            'variants.color_id'  => 'required|array',
            'variants.size_id'   => 'required|array',
            'variants.price'     => 'required|array',
            'variants.quantity'  => 'required|array',
            'variants.id'        => 'array',

            'variants.color_id.*' => ['required', Rule::exists('colors', 'id')],
            'variants.size_id.*'  => ['required', Rule::exists('sizes', 'id')],
            'variants.price.*'    => ['required', 'numeric', 'min:0'],
            'variants.quantity.*' => ['required', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($request, $product) {
            if ($request->hasFile('image')) {
                $this->deleteProductImage($product->image);
                $product->image = $this->saveProductImage($request->file('image'));
            }

            $updateData = $request->only('name', 'description', 'category_id');
            if ($request->hasFile('image')) {
                $this->deleteProductImage($product->image);
                $updateData['image'] = $this->saveProductImage($request->file('image'));
            }
            $product->update($updateData);

            $ids        = $request->input('variants.id', []);
            $colors     = $request->input('variants.color_id');
            $sizes      = $request->input('variants.size_id');
            $prices     = $request->input('variants.price');
            $quantities = $request->input('variants.quantity');

            $keepIds = [];

            foreach ($colors as $idx => $colorId) {
                $data = [
                    'color_id' => $colorId,
                    'size_id'  => $sizes[$idx],
                    'price'    => $prices[$idx],
                    'quantity' => $quantities[$idx],
                ];

                if (!empty($ids[$idx])) {
                    $keepIds[] = $ids[$idx];
                    $product->variants()->where('id', $ids[$idx])->update($data);
                } else {
                    $new = $product->variants()->create($data);
                    $keepIds[] = $new->id;
                }
            }

            $product->variants()->whereNotIn('id', $keepIds)->delete();
        });

        return back()->with('success', 'محصول و تصویر با موفقیت ویرایش شدند.');
    }


    public function destroy(Product $product)
    {
        $this->deleteProductImage($product->image);

        $product->variants()->delete();
        $product->delete();

        return redirect()->back()->with('success', 'محصول و تصویر آن حذف شد.');
    }
}
