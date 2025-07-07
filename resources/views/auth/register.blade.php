@extends('layouts.authmaster')
@section('title', 'ثبت نام')
@section('MyContentArea')
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 py-6 px-8 text-center">
                <h1 class="text-white text-2xl font-bold">ثبت نام کاربر جدید</h1>
                <p class="text-blue-100 mt-2">لطفا اطلاعات خود را وارد نمایید</p>
            </div>

            <!-- Form -->
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Input -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">نام و نام‌خانوادگی</label>
                        <div
                            class="input-focus-effect relative rounded-md transition-all duration-200 border border-gray-300">
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                            <input type="text" name="name" id="name"
                                class="block w-full pr-10 py-3 px-4 bg-gray-50 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                                placeholder="نام و نام‌خانوادگی" required>
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">ایمیل</label>
                        <div
                            class="input-focus-effect relative rounded-md transition-all duration-200 border border-gray-300">
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email"
                                class="block w-full pr-10 py-3 px-4 bg-gray-50 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                                placeholder="example@domain.com" required>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-2">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">رمز عبور</label>
                        <div
                            class="input-focus-effect relative rounded-md transition-all duration-200 border border-gray-300">
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password" id="password"
                                class="block w-full pr-10 py-3 px-4 bg-gray-50 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                                placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">تکرار رمز
                            عبور</label>
                        <div
                            class="input-focus-effect relative rounded-md transition-all duration-200 border border-gray-300">
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="block w-full pr-10 py-3 px-4 bg-gray-50 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        ساخت حساب
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-gray-500">
                    حساب کاربری دارید؟
                    <a href="/login" class="font-medium text-blue-600 hover:text-blue-500">وارد شوید</a>
                </div>
            </div>
        </div>
    </div>
@endsection
