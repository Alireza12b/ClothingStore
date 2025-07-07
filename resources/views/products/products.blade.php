@extends('layouts.master')
@section('title', $category->name ?? 'همه محصولات')
@section('MyContentArea')
<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">
            {{ $category->name ?? 'همه محصولات' }}
        </h2>
        @isset($category)
            <p class="text-gray-500">{{ $category->description }}</p>
        @endisset
    </div>

    @if ($products->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}">
                    <div class="border rounded-lg overflow-hidden shadow hover:shadow-md transition">
                        <img src="{{ asset('assets/img/' . ($product->image ?? 'default.jpg')) }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                        <div class="p-4 text-right">
                            <h3 class="font-semibold text-lg text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm font-bold text-gray-650">{{ $product->category->name }}</p>
                            <p class="text-blue-600 text-sm mt-1">
                                از {{ number_format($product->variants->min('price')) }} تومان
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $products->links() }}
        </div>
    @else
        <p class="text-center text-gray-600">محصولی یافت نشد.</p>
    @endif
</div>
@endsection
