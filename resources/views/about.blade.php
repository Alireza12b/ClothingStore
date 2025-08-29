@extends('layouts.master')
@section('title', 'درباره ما')
@section('MyContentArea')

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-20">
    <div class="container">
        <h1 class="display-4 fw-bold">فروشگاه لباس</h1>
        <p class="lead mt-3">بهترین انتخاب برای لباس‌های مدرن و شیک</p>
        <a href="{{ url('/') }}" class="btn btn-light mt-4 px-5 py-2">خانه</a>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/696302cd-0ebb-48ed-a6a0-e5c210042800.png') }}" class="img-fluid rounded shadow" alt="فروشگاه لباس">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">درباره ما</h2>
                <p class="mb-4">فروشگاه لباس با هدف ارائه بهترین و با کیفیت‌ترین لباس‌ها برای مشتریان خود راه‌اندازی شده است. ما به دنبال رضایت کامل مشتریان و تجربه خریدی لذت‌بخش هستیم.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>کیفیت بالا و تضمین محصولات</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>تنوع گسترده و مد روز</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>پشتیبانی سریع و مطمئن</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16">
    <div class="container text-center">
        <h2 class="fw-bold mb-8">تیم ما</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">علیرضا</h5>
                        <p class="card-text text-muted">مدیر فروشگاه</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">امیر</h5>
                        <p class="card-text text-muted">طراح و بازاریاب</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">مهدی</h5>
                        <p class="card-text text-muted">توسعه‌دهنده وب</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">همین حالا خرید خود را شروع کنید</h2>
        <p class="mb-6">به جمع مشتریان راضی ما بپیوندید و لباس‌های مدرن و باکیفیت را تجربه کنید</p>
        <a href="{{ url('/products') }}" class="btn btn-light btn-lg px-5 py-3">مشاهده محصولات</a>
    </div>
</section>

@endsection
