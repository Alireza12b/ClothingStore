<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $items = $cart->items()->with('variant.product')->get();

        return view('cart', compact('items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant = ProductVariant::findOrFail($request->variant_id);

        if ($request->quantity > $variant->quantity) {
            return back()->withErrors(['quantity' => 'موجودی کافی نیست.']);
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_variant_id' => $variant->id,
        ]);

        $item->quantity = $item->exists ? $item->quantity + $request->quantity : $request->quantity;
        $item->save();

        $variant->decrement('quantity', $request->quantity);

        return redirect()->route('cart.index')->with('success', 'محصول به سبد خرید اضافه شد.');
    }

    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $variant = $item->variant;

        $difference = $request->quantity - $item->quantity;

        if ($variant->quantity < $difference) {
            return back()->with('error', 'موجودی کافی نیست.');
        }

        $variant->quantity -= $difference;
        $variant->save();

        $item->quantity = $request->quantity;
        $item->save();

        return back()->with('success', 'تعداد به‌روزرسانی شد.');
    }

    public function remove(CartItem $item)
    {
        $variant = $item->variant;
        $variant->quantity += $item->quantity;
        $variant->save();

        $item->delete();

        return back()->with('success', 'حذف شد.');
    }
}
