@extends('patient.dashboard')
@section('content_page')
<div class="container">
    <h2>dr.{{ $doctor->user->name }} حجز موعد مع  </h2>
    <form method="POST" action="{{ route('book.appointment', $doctor->id) }}">
        @csrf
        <div class="mb-3">
            <label for="appointment_date" class="form-label">تاريخ الموعد</label>
            <input type="date" class="form-control" id="appointment_date" name="AppointmentDate" required>
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
        <button type="submit" class="btn btn-primary">احجز الآن</button>
    </form>
</div>
@stop


