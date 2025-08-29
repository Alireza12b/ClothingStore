@extends('layouts.master')
@section('title', 'تماس با ما')
@section('MyContentArea')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>تماس با ما</h3>
                        <p>فرم زیر را پر کنید و ما به شما پاسخ خواهیم داد</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">نام</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ایمیل</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">موضوع</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">پیام</label>
                                <textarea name="message" rows="5" class="form-control">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">ارسال پیام</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted">
                        ما به تمام پیام‌ها در سریع‌ترین زمان پاسخ می‌دهیم
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
