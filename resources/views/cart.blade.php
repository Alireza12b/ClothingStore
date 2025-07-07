@extends('layouts.master')
@section('title', $category->name ?? 'سبد خرید')
@section('MyContentArea')
    <div class="container mx-auto px-4 py-10" style="margin-bottom: 20%;">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">سبد خرید شما</h2>

        @if ($items->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr class="text-right bg-gray-100 text-sm text-gray-600">
                            <th class="p-4">محصول</th>
                            <th class="p-4">قیمت</th>
                            <th class="p-4">تعداد</th>
                            <th class="p-4">مجموع</th>
                            <th class="p-4">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="border-b">
                                <td class="p-4">{{ $item->variant->product->name }}</td>
                                <td class="p-4">{{ number_format($item->variant->price) }} تومان</td>
                                <td class="p-4">
                                    <form action="{{ route('cart.update', $item) }}" method="POST"
                                        class="flex items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                            class="w-16 px-2 py-1 border rounded text-center text-sm">
                                        <button type="submit"
                                            class="ml-2 mr-2 text-blue-600 hover:underline text-sm">بروزرسانی</button>
                                    </form>
                                </td>
                                <td class="p-4 text-sm font-bold text-blue-700">
                                    {{ number_format($item->quantity * $item->variant->price) }} تومان
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8 flex justify-center">
                <a href="#"
                    class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300">
                    تکمیل خرید
                </a>
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">سبد خرید شما خالی است.</p>
        @endif
    </div>
@endsection
