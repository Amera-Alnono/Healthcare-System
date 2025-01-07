@extends('index')
@section('sidebar')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>لوحة تحكم الطبيب</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Admin:</h6>
                <a class="collapse-item" href="{{ route('doctor.patients.index') }}"> عرض المرضى</a>
                <a class="collapse-item" href="{{ route('createAppointmentForm') }}">حجز موعد ل مريض</a>
                <a class="collapse-item" href="{{ route('diagnoses.create') }}">عمل وصفة طبية</a>
            </div>
        </div>
    </li>
@stop
@section('main_content')
    <h1>Hello {{ Auth::user()->name }}</h1>
    <div>  @yield('content_page') </div>

@stop
