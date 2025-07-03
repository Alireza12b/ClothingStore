@extends('master')

@section('MyContentArea')
    <div class="container mx-auto px-4 py-10">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Image Slider -->
            <div>
                <div class="relative w-full overflow-hidden rounded-lg">
                    <div id="mainImageContainer">
                        <img id="mainImage" src="/images/product1.jpg" class="w-full h-auto rounded-lg" alt="Product">
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <img src="/images/product1.jpg" class="w-20 h-20 rounded cursor-pointer border border-blue-500"
                        onclick="changeImage(this.src)">
                    <img src="/images/product2.jpg" class="w-20 h-20 rounded cursor-pointer"
                        onclick="changeImage(this.src)">
                    <img src="/images/product3.jpg" class="w-20 h-20 rounded cursor-pointer"
                        onclick="changeImage(this.src)">
                </div>
            </div>

            <!-- Product Details -->
            <div class="text-right">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">پیراهن مردانه کلاسیک</h2>
                <p class="text-gray-600 mb-4">پیراهنی شیک و راحت مناسب برای موقعیت‌های رسمی و نیمه‌رسمی</p>
                <p class="text-xl font-semibold text-blue-600 mb-4">۵۴۰٬۰۰۰ تومان</p>

                <!-- Color Selector -->
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-gray-700">رنگ:</label>
                    <div class="flex gap-2">
                        <button
                            class="w-8 h-8 rounded-full border border-gray-300 bg-red-500 hover:ring-2 ring-red-300"></button>
                        <button
                            class="w-8 h-8 rounded-full border border-gray-300 bg-blue-500 hover:ring-2 ring-blue-300"></button>
                        <button
                            class="w-8 h-8 rounded-full border border-gray-300 bg-green-500 hover:ring-2 ring-green-300"></button>
                    </div>
                </div>

                <!-- Size Selector -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">سایز:</label>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 border rounded hover:bg-blue-100">S</button>
                        <button class="px-4 py-2 border rounded hover:bg-blue-100">M</button>
                        <button class="px-4 py-2 border rounded hover:bg-blue-100">L</button>
                        <button class="px-4 py-2 border rounded hover:bg-blue-100">XL</button>
                    </div>
                </div>

                <!-- Add to Cart -->
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">افزودن به سبد
                    خرید</button>
            </div>
        </div>
    </div>

    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
@endsection
