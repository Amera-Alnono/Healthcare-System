@extends('patient.dashboard')
@section('content_page')
<div class="container">
    <h2>مواعيدي المحجوزة</h2>

    @if ($appointments->isEmpty())
        <p>لا توجد مواعيد محجوزة بعد.</p>
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
</div>
@stop



{{--
@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <h2>مواعيدي المحجوزة</h2>

        @if ($appointments->isEmpty())
            <p>لا توجد مواعيد محجوزة بعد.</p>
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
    </div>
@endsection --}}
