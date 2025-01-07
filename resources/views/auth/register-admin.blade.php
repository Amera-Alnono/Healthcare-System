@extends('admin.dashboard')
@section('content_page')
    <div class="container">

        <form method="POST" action="{{ route('register.admin') }}">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">الاسم</label>
                <input type="text" name="name" placeholder="Admin Name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="mb-3"><button type="submit">Register as Admin</button></div>
        </form>
    </div>
@stop
