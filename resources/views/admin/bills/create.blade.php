@extends('admin.dashboard')
@section('content_page')

<div class="container">
    <h2>إضافة فاتورة جديدة</h2>
    <form method="POST" action="{{ route('admin.bills.store') }}">
        @csrf

        <div class="mb-3">
            <label for="patient_id" class="form-label">اختيار المستخدم</label>
            <select class="form-control" name="patient_id" id="patient_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">المبلغ</label>
            <input type="number" class="form-control" name="amount" id="amount" required>
        </div>

        <div class="mb-3">
            <label for="PaymentDate" class="form-label">تاريخ الاستحقاق</label>
            <input type="date" class="form-control" name="PaymentDate" id="PaymentDate" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">حالة الفاتورة</label>
            <select class="form-control" name="status" id="status" required>
                <option value="unpaid">غير مدفوعة</option>
                <option value="paid">مدفوعة</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">إضافة الفاتورة</button>
    </form>
</div>

@stop





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة فاتورة جديدة</h2>
    <form method="POST" action="{{ route('admin.bills.store') }}">
        @csrf

        <div class="mb-3">
            <label for="patient_id" class="form-label">اختيار المستخدم</label>
            <select class="form-control" name="patient_id" id="patient_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">المبلغ</label>
            <input type="number" class="form-control" name="amount" id="amount" required>
        </div>

        <div class="mb-3">
            <label for="PaymentDate" class="form-label">تاريخ الاستحقاق</label>
            <input type="date" class="form-control" name="PaymentDate" id="PaymentDate" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">حالة الفاتورة</label>
            <select class="form-control" name="status" id="status" required>
                <option value="unpaid">غير مدفوعة</option>
                <option value="paid">مدفوعة</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">إضافة الفاتورة</button>
    </form>
</div>
@endsection --}}
