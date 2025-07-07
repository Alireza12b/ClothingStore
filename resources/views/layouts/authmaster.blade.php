<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title') | فروشگاه لباس@elseفروشگاه لباس
        @endif
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        .input-focus-effect:focus-within {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .remember-me:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    @yield('MyContentArea')

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @include('partials.alerts')
</body>

</html>
