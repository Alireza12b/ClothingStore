    <!DOCTYPE html>
    <html lang="fa" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>فروشگاه مد و لباس | خانه</title>
        <!-- Bootstrap RTL CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body class="bg-gray-50">
        <!-- Scroll to top button -->
        <div class="scroll-to-top" id="scrollToTop">
            <i class="fas fa-arrow-up"></i>
        </div>

        <!-- Top Bar -->
        <div class="bg-blue-600 text-white py-2 text-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4 space-x-reverse">
                        <span><i class="fas fa-phone ml-1"></i> 021-11111111</span>
                        <span><i class="fas fa-envelope ml-1"></i> info@forooshgah.com</span>
                    </div>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="#" class="hover:text-blue-200"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-blue-200"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="hover:text-blue-200"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-blue-600">فروشگاه لباس</a>
                    </div>

                    <!-- Search Bar -->
                    <div class="hidden md:block w-1/3">
                        <div class="relative">
                            <input type="text" placeholder="جستجوی محصولات..."
                                class="w-full py-2 px-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button class="absolute left-3 top-2 text-gray-500">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Navigation and Cart -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <nav class="hidden md:block">
                            <ul class="flex space-x-6 space-x-reverse">
                                <li><a href="#" class="text-gray-800 hover:text-blue-600 font-medium">خانه</a>
                                </li>
                                <li><a href="#" class="text-gray-800 hover:text-blue-600 font-medium">محصولات</a>
                                </li>
                                <li><a href="#" class="text-gray-800 hover:text-blue-600 font-medium">تماس با
                                        ما</a>
                                </li>
                                <li><a href="#" class="text-gray-800 hover:text-blue-600 font-medium">درباره
                                        ما</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <a href="#" class="text-gray-800 hover:text-blue-600 relative">
                                <i class="fas fa-shopping-cart text-xl"></i>
                                <span
                                    class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">5</span>
                            </a>
                            <a href="#" class="text-gray-800 hover:text-blue-600">
                                <i class="fas fa-user text-xl"></i>
                            </a>
                        </div>
                        <button class="md:hidden text-gray-800" id="mobileMenuButton">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden bg-white shadow-lg hidden" id="mobileMenu">
                <div class="container mx-auto px-4 py-3">
                    <div class="mb-3">
                        <input type="text" placeholder="جستجوی محصولات..."
                            class="w-full py-2 px-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <ul class="space-y-3">
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-blue-600 font-medium">خانه</a>
                        </li>
                        <li><a href="#"
                                class="block py-2 text-gray-800 hover:text-blue-600 font-medium">محصولات</a>
                        </li>
                        <li><a href="#"
                                class="block py-2 text-gray-800 hover:text-blue-600 font-medium">دسته‌بندی‌ها</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-blue-600 font-medium">تماس با
                                ما</a></li>
                        <li><a href="#" class="block py-2 text-gray-800 hover:text-blue-600 font-medium">درباره
                                ما</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        @yield('MyContentArea')

        <!-- Footer -->
        <footer class="bg-gray-800 text-white pt-12 pb-6">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">فروشگاه لباس</h3>
                        <p class="text-gray-400 mb-4">فروشگاه اینترنتی مد و لباس با ارائه جدیدترین ترندهای روز دنیا</p>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="#" class="text-gray-400 hover:text-white"><i
                                    class="fab fa-instagram text-xl"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white"><i
                                    class="fab fa-telegram text-xl"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white"><i
                                    class="fab fa-whatsapp text-xl"></i></a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">دسترسی سریع</h3>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-gray-400 hover:text-white">خانه</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">محصولات</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">تماس با ما</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">درباره ما</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">خدمات مشتریان</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">ورود</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">سبد خرید</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">پنل کاربری</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">تماس با ما</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-gray-400"><i class="fas fa-map-marker-alt ml-2"></i>
                                تهران،
                                خیابان ولیعصر، پلاک ۱۲۳۴</li>
                            <li class="flex items-center text-gray-400"><i class="fas fa-phone ml-2"></i> 021-11111111
                            </li>
                            <li class="flex items-center text-gray-400"><i class="fas fa-envelope ml-2"></i>
                                info@forooshgah.com</li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 mb-4 md:mb-0">© ۱۴۰۲ تمامی حقوق برای فروشگاه لباس محفوظ است.</p>
                        <div class="flex space-x-4 space-x-reverse">

                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JavaScript -->
        <script src="/assets/js/main.js"></script>
    </body>

    </html>
