<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelthCare</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- هنا يمكن إضافة القائمة العلوية أو الشريط الجانبي -->
        <ul>
            <li><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
            <li><a href="{{ route('choose.doctor') }}">اختيار الطبيب</a></li>
            <li><a href="{{ route('appointments.index') }}">مواعيدي</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content') <!-- مكان عرض محتوى الصفحات المختلفة -->
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
