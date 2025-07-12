<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت کاربران</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #0ea5e9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0284c7;
        }

        /* Animation for modal */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-animation {
            animation: modalFadeIn 0.3s ease-out;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="bg-primary-500 text-white p-2 rounded-lg">
                        <i class="fas fa-users-cog text-xl"></i>
                    </div>
                    <h1 class="text-xl font-bold text-gray-800">پنل مدیریت کاربران</h1>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <img src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png"
                            alt="Profile" class="w-12 h-8 rounded-full">
                        <span class="font-medium">{{ auth()->check() ? auth()->user()->name : 'مدیر سیستم' }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-sm hidden md:block">
                <div class="p-4">
                    <nav class="mt-6">
                        <div class="space-y-2">
                            <a href="/"
                                class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-house"></i>
                                <span>خانه</span>
                            </a>
                            <a href="/manage/users"
                                class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-users"></i>
                                <span>مدیریت کاربران</span>
                            </a>
                            <a href="/manage/products"
                                class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-chart-line"></i>
                                <span>مدیریت محصولات</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </aside>

            @yield('MyContentArea')

        </div>
    </div>

    @include('partials.alerts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
