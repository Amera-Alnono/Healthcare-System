@extends('admin.dashboard')
@section('content_page')
<div class="container">

    <form method="POST" action="{{ route('register.doctor') }}">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">الاسم</label>
            <input type="text" name="name" placeholder="Doctor Name" required>
        </div>
        <div class="mb-3">
            <label for="Name" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="Name" class="form-label">كلمة المرور</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="Name" class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <!-- الحقول الإضافية للطبيب -->
        <div class="mb-3">
                <label for="Name" class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" placeholder="Phone Number" required></div>
        <div class="mb-3">
                <label for="Name" class="form-label">التخصص</label>
                <input type="text" name="specialty" placeholder="specialty" required></div>
       <div class="mb-3">
                <label for="Name" class="form-label">العنوان</label>

            <textarea name="address" placeholder="Address" required></textarea>
        </div>
       <div class="mb-3">
                <label for="Name" class="form-label">تاريخ التسجيل</label>
                 <input type="date" name="RegistrationDate" required></div>

        <div class="mb-3"> <button type="submit">Register as Doctor</button></div>
    </form>
</div>
@stop
