@extends('patient.dashboard')
@section('content_page')
<div class="container">
    <h2>تحديث بياناتك</h2>
    <form method="POST" action="{{ route('patients.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->patient->phone }}">
        </div>

        <div class="mb-3">
            <label for="documents" class="form-label">المستندات</label>
            <input type="file" class="form-control" id="documents" name="documents">
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@stop



{{--
@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <h2>تحديث بياناتك</h2>
        <form method="POST" action="{{ route('patients.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->patient->phone }}">
            </div>

            <div class="mb-3">
                <label for="documents" class="form-label">المستندات</label>
                <input type="file" class="form-control" id="documents" name="documents">
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
    </div>
@endsection --}}
