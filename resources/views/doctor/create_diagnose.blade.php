@extends('doctor.dashboard')
@section('content_page')
<form method="POST" action="{{ route('diagnoses.store') }}">
    @csrf
    <label for="patient">Select Patient:</label>
    <select name="patient_id" id="patient" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->user->id }}">{{ $patient->user->name }}</option>
        @endforeach
    </select>

    <label for="diagnosis">Diagnosis:</label>
    <textarea name="diagnosis" id="diagnosis" required></textarea>

    <label for="treatment">Treatment:</label>
    <textarea name="treatment" id="treatment"></textarea>

    <label for="prescription">Prescription:</label>
    <textarea name="prescription" id="prescription"></textarea>

    <button type="submit">Save and Send to patient</button>
</form>
@stop


{{-- @extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('diagnoses.store') }}">
    @csrf
    <label for="patient">Select Patient:</label>
    <select name="patient_id" id="patient" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->user->id }}">{{ $patient->user->name }}</option>
        @endforeach
    </select>

    <label for="diagnosis">Diagnosis:</label>
    <textarea name="diagnosis" id="diagnosis" required></textarea>

    <label for="treatment">Treatment:</label>
    <textarea name="treatment" id="treatment"></textarea>

    <label for="prescription">Prescription:</label>
    <textarea name="prescription" id="prescription"></textarea>

    <button type="submit">Save</button>
</form>

@stop --}}
