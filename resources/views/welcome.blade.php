@extends('layouts.master')
@section('MyContentArea')
    <!-- Hero Section -->
    <section class="hero-section py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">جدیدترین مدل‌های لباس مردانه و زنانه
                    </h1>
                    <p class="text-gray-600 mb-6 text-lg">با جدیدترین ترندهای فصل آشنا شوید و استایل خود را متحول کنید
                    </p>
                    <div class="flex space-x-3 space-x-reverse">
                        <a href="#"
                            class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300 font-medium">مشاهده
                            محصولات</a>
                        <a href="#"
                            class="border border-blue-600 text-blue-600 px-6 py-3 rounded-full hover:bg-blue-50 transition duration-300 font-medium">درباره
                            ما</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="Fashion Models" class="rounded-lg shadow-xl w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">دسته‌بندی محصولات</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">محصولات ما را در دسته‌بندی‌های مختلف کشف کنید</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <a href="">
                    <div
                        class="category-card bg-gray-50 rounded-lg overflow-hidden shadow-sm text-center p-6 hover:shadow-md">
                        <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-tshirt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">لباس مردانه</h3>
                        <p class="text-gray-600 text-sm">۱۵۰ محصول</p>
                    </div>
                </a>

                <a href="">
                    <div
                        class="category-card bg-gray-50 rounded-lg overflow-hidden shadow-sm text-center p-6 hover:shadow-md">
                        <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-female text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">لباس زنانه</h3>
                        <p class="text-gray-600 text-sm">۲۱۰ محصول</p>
                    </div>
                </a>

                <a href="">
                    <div
                        class="category-card bg-gray-50 rounded-lg overflow-hidden shadow-sm text-center p-6 hover:shadow-md">
                        <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-child text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">لباس بچه‌گانه</h3>
                        <p class="text-gray-600 text-sm">۹۵ محصول</p>
                    </div>
                </a>

                <a href="">
                    <div
                        class="category-card bg-gray-50 rounded-lg overflow-hidden shadow-sm text-center p-6 hover:shadow-md">
                        <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-shoe-prints text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">کفش و کتانی</h3>
                        <p class="text-gray-600 text-sm">۷۸ محصول</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">آخرین محصولات</h2>
                    <p class="text-gray-600">بهترین محصولات با بهترین قیمت‌ها</p>
                </div>
                <a href="/products" class="text-blue-600 hover:text-blue-800 font-medium">مشاهده همه <i
                        class="fas fa-arrow-left mr-1"></i></a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">


                <!-- Product 1 -->
                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md">
                    <a href="#">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1528&q=80"
                                alt="Product 1" class="w-full h-64 object-cover">
                        </div>
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-gray-800">پیراهن مردانه اسلیم</h3>
                            </div>
                        </a>
                        <p class="text-gray-600 text-sm mb-3">پیراهن مردانه رسمی با جنس کتان</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-blue-600 font-bold block">۲۳۲,۰۰۰ تومان</span>
                            </div>
                            <button
                                class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center hover:bg-blue-200">
                                <i class="fas fa-shopping-cart text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <!-- Brands -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">برندهای همکار</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">با بهترین برندهای دنیا همکاری می‌کنیم</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
                <div class="flex justify-center items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/2560px-Adidas_Logo.svg.png"
                        alt="Adidas" class="h-12 object-contain opacity-70 hover:opacity-100 transition">
                </div>
                <div class="flex justify-center items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
                        alt="Nike" class="h-12 object-contain opacity-70 hover:opacity-100 transition">
                </div>
                <div class="flex justify-center items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/2560px-H%26M-Logo.svg.png"
                        alt="H&M" class="h-12 object-contain opacity-70 hover:opacity-100 transition">
                </div>
                <div class="flex justify-center items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Zara_Logo.svg/1200px-Zara_Logo.svg.png"
                        alt="Zara" class="h-12 object-contain opacity-70 hover:opacity-100 transition">
                </div>
                <div class="flex justify-center items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/da/Puma_complete_logo.svg/1200px-Puma_complete_logo.svg.png"
                        alt="Uniqlo" class="h-12 object-contain opacity-70 hover:opacity-100 transition">
                </div>
            </div>
        </div>
    </section>
@endsection
