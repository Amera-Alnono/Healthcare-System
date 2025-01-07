@extends('patient.dashboard')
@section('content_page')
<div class="container">
    <h2>اختر الطبيب</h2>
    <form method="GET" action="{{ route('choose.doctor') }}">
        <div class="mb-3">
            <label for="specialty" class="form-label">التخصص</label>
            <select class="form-control" id="specialty" name="specialty">
                <option value="">جميع التخصصات</option>
                <!-- هنا قم بإضافة التخصصات التي تريد تصفيتها -->
                @foreach($doctors->pluck('specialty')->unique() as $specialty)
                <option value="{{ $specialty }}" {{ request('specialty') == $specialty ? 'selected' : '' }}>
                    {{ $specialty }}
                </option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ابحث</button>
    </form>
    <div class="row mt-4">
        @foreach($doctors as $doctor)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="card-text">{{ $doctor->specialty }}</p>
                        <a href="{{ route('book.appointment.form', $doctor->id) }}" class="btn btn-primary">احجز موعدًا</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop




{{-- @extends('layouts.main_layout')

@section('content')
    <div class="container">
        <h2>اختر الطبيب</h2>
        <form method="GET" action="{{ route('choose.doctor') }}">
            <div class="mb-3">
                <label for="specialty" class="form-label">التخصص</label>
                <select class="form-control" id="specialty" name="specialty">
                    <option value="">جميع التخصصات</option>
                    <!-- هنا قم بإضافة التخصصات التي تريد تصفيتها -->
                    @foreach($doctors->pluck('specialty')->unique() as $specialty)
                    <option value="{{ $specialty }}" {{ request('specialty') == $specialty ? 'selected' : '' }}>
                        {{ $specialty }}
                    </option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">ابحث</button>
        </form>
        <div class="row mt-4">
            @foreach($doctors as $doctor)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->name }}</h5>
                            <p class="card-text">{{ $doctor->specialty }}</p>
                            <a href="{{ route('book.appointment.form', $doctor->id) }}" class="btn btn-primary">احجز موعدًا</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop --}}
