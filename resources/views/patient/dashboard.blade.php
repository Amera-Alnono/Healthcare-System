@extends('index')
@section('sidebar')
 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>لوحة تحكم المريض</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Patient:</h6>
            <a class="collapse-item" href="{{ route('appointments.index') }}">المواعيد</a>
            <a class="collapse-item" href="{{ route('choose.doctor') }}">حجز موعد جديد</a>
            <a class="collapse-item" href="{{ route('patients.edit', auth()->user()->id) }}">تحديث البيانات</a>
        </div>
    </div>
</li>
@stop
@section('main_content')
<div class="container">
    <h2>مرحباً، {{ auth()->user()->name }}</h2>
    <p>رقم المريض: {{ auth()->user()->patient->id }}</p>

</div>
    <div>  @yield('content_page') </div>
@stop




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - {{ $patient->name }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>مرحباً، {{ $patient->name }}</h2>
        <p>رقم المريض: {{ $patient->id }}</p>

        <h3>المواعيد الخاصة بك:</h3>
        @if ($appointments->isEmpty())
            <p>لا توجد مواعيد حالياً.</p>
        @else
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>الطبيب</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>نوع الموعد</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->doctor->user->name }}</td>
                            <td>{{ $appointment->AppointmentDate }}</td>
                            <td>{{ $appointment->AppointmentTime }}</td>
                            <td>{{ ucfirst($appointment->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('choose.doctor') }}" class="btn btn-primary">احجز موعد جديد</a>
        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">تحديث البيانات</a>
    </div>
</body>
</html>
 --}}
