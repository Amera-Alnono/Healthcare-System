@extends('index')
@section('sidebar')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>لوحة تحكم المدير</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Admin:</h6>
                <a class="collapse-item" href="{{ route('register.doctor.form') }}">إضافة طبيب</a>
                <a class="collapse-item" href="{{ route('register.admin.form') }}">إضافة مدير جديد</a>
                <a class="collapse-item" href="{{ route('admin.patients') }}">إدارة المرضى</a>
                <a class="collapse-item" href="{{ route('admin.bills.index') }}">الفواتير </a>
                <a class="collapse-item" href="{{ route('cloud.data.index') }}">إدارة البيانات السحابية</a>
            </div>
        </div>
    </li>
@stop
@section('main_content')
    <h1>Hello {{ Auth::user()->name }}</h1>
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
@endsection --}}





{{-- <h2>لوحة تحكم المدير</h2>
<div class="row"> --}}
{{-- <div class="col-md-3">
        <a href="{{ route('admin.add.patient.form') }}" class="btn btn-success">إضافة مريض جديد</a>
    </div> --}}
{{-- <div class="col-md-3">
        <a href="{{ route('register.doctor.form') }}" class="btn btn-success">إضافة طبيب جديد</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('register.admin.form') }}" class="btn btn-success">إضافة مدير جديد</a>
    </div> --}}

{{-- <div class="col-md-3">
        <a href="{{ route('admin.patients') }}" class="btn btn-success">إدارة المرضى</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.bills.index') }}" class="btn btn-success">عرض الفواتير</a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('cloud.data.index') }}" class="btn btn-success">إدارة البيانات السحابية</a>
    </div> --}}

{{-- </div> --}}
