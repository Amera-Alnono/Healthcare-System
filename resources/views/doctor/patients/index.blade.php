@extends('doctor.dashboard')
@section('content_page')
<h2>المرضى الجدد</h2>
<ul>
    @forelse($newPatients as $patient)
        <li>
            <strong>اسم المريض:</strong> {{ $patient->user->name }}
            @php
                    $appointment = $patient->appointments->first(); // الموعد الأول فقط
                @endphp
                @if($appointment)
                    <ul>
                        <li>التاريخ: {{ $appointment->AppointmentDate }} - الوقت: {{ $appointment->AppointmentTime }}</li>
                    </ul>
                @else
                    <p>لا يوجد مواعيد.</p>
                @endif

        </li>
    @empty
        <li>لا يوجد مرضى جدد.</li>
    @endforelse
</ul>

<h2>المرضى المتابعين</h2>
<ul>
    @forelse($followUpPatients as $patient)
        <li>
            <strong>اسم المريض:</strong> {{ $patient->user->name }}
            @php
                    $appointment = $patient->appointments->first(); // الموعد الأول فقط
                @endphp
                @if($appointment)
                    <ul>
                        <li>التاريخ: {{ $appointment->AppointmentDate }} - الوقت: {{ $appointment->AppointmentTime }}</li>
                    </ul>
                @else
                    <p>لا يوجد مواعيد.</p>
                @endif
        </li>
    @empty
        <li>لا يوجد مرضى متابعون.</li>
    @endforelse
</ul>
@stop


{{--

 @extends('layouts.app')

@section('content')
<h1>قائمة المرضى</h1>

<h2>المرضى الجدد</h2>
<ul>
    @forelse($newPatients as $patient)
        <li>
            <strong>اسم المريض:</strong> {{ $patient->user->name }}
            @php
                    $appointment = $patient->appointments->first(); // الموعد الأول فقط
                @endphp
                @if($appointment)
                    <ul>
                        <li>التاريخ: {{ $appointment->AppointmentDate }} - الوقت: {{ $appointment->AppointmentTime }}</li>
                    </ul>
                @else
                    <p>لا يوجد مواعيد.</p>
                @endif

        </li>
    @empty
        <li>لا يوجد مرضى جدد.</li>
    @endforelse
</ul>

<h2>المرضى المتابعين</h2>
<ul>
    @forelse($followUpPatients as $patient)
        <li>
            <strong>اسم المريض:</strong> {{ $patient->user->name }}
            @php
                    $appointment = $patient->appointments->first(); // الموعد الأول فقط
                @endphp
                @if($appointment)
                    <ul>
                        <li>التاريخ: {{ $appointment->AppointmentDate }} - الوقت: {{ $appointment->AppointmentTime }}</li>
                    </ul>
                @else
                    <p>لا يوجد مواعيد.</p>
                @endif
        </li>
    @empty
        <li>لا يوجد مرضى متابعون.</li>
    @endforelse
</ul>
    <a href="{{ route('createAppointmentForm') }}" class="btn btn-primary">حجز موعد جديد</a>
    <a href="{{ route('diagnoses.create') }}" class="btn btn-primary">عمل وصفة طبية</a>
@endsection --}}
