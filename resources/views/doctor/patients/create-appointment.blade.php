@extends('doctor.dashboard')
@section('content_page')
<div class="container">
    <h2>إضافة موعد للمريض</h2>
    <form action="{{ route('doctor.patients.createAppointment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patient_id">اختار المريض</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->user->id }}">{{ $patient->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="AppointmentDate" class="form-label">تاريخ الموعد</label>
            <input type="date" class="form-control" id="AppointmentDate" name="AppointmentDate" required>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">وقت الموعد</label>
            <input type="time" class="form-control" id="appointment_time" name="AppointmentTime" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">نوع الموعد</label>
            <select class="form-control" id="type" name="status" required>
                <option value="appointment">in:appointment</option>
                <option value="follow-up">follow-up</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">إضافة الموعد</button>
    </form>
</div>
@stop



{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>إضافة موعد للمريض</h2>
        <form action="{{ route('doctor.patients.createAppointment') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient_id">اختار المريض</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->user->id }}">{{ $patient->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="AppointmentDate" class="form-label">تاريخ الموعد</label>
                <input type="date" class="form-control" id="AppointmentDate" name="AppointmentDate" required>
            </div>
            <div class="mb-3">
                <label for="appointment_time" class="form-label">وقت الموعد</label>
                <input type="time" class="form-control" id="appointment_time" name="AppointmentTime" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">نوع الموعد</label>
                <select class="form-control" id="type" name="status" required>
                    <option value="appointment">in:appointment</option>
                    <option value="follow-up">follow-up</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">إضافة الموعد</button>
        </form>
    </div>
@endsection --}}
