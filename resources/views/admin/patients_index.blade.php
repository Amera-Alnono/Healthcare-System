@extends('admin.dashboard')
@section('content_page')
<div class="container">
    <h2>إدارة المرضى</h2>
    <table border="1">
        <thead>
            <tr>
                <th>اسم المريض</th>
                <th>البريد الإلكتروني</th>
                <th>معرف المريض</th>
                <th>الإجراء</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->user->name }}</td>
                    <td>{{ $patient->user->email }}</td>
                    <td>{{ $patient->unique_patient_code ?? 'لم يتم توليد المعرف بعد' }}</td>
                    <td>
                        @if (!$patient->unique_patient_code)
                            <a href="{{ route('admin.assignPatientId', $patient->id) }}" class="btn btn-success">توليد معرف المريض</a>
                        @else
                            <span class="badge badge-success">تم توليد المعرف</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>إدارة المرضى</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>اسم المريض</th>
                    <th>البريد الإلكتروني</th>
                    <th>معرف المريض</th>
                    <th>الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->user->name }}</td>
                        <td>{{ $patient->user->email }}</td>
                        <td>{{ $patient->unique_patient_code ?? 'لم يتم توليد المعرف بعد' }}</td>
                        <td>
                            @if (!$patient->unique_patient_code)
                                <a href="{{ route('admin.assignPatientId', $patient->id) }}" class="btn btn-success">توليد معرف المريض</a>
                            @else
                                <span class="badge badge-success">تم توليد المعرف</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
