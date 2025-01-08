@extends('admin.dashboard')
@section('content_page')
    <div class="container">
        <h2>إدارة الفواتير</h2>
        <a href="{{ route('admin.bills.create') }}" class="btn btn-success">إضافة فاتورة جديدة</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المستخدم</th>
                    <th>المبلغ</th>
                    <th>حالة الدفع</th>
                    <th>تاريخ الاستحقاق</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->patient->user->name }}</td>
                        <td>{{ $bill->amount }}$</td>
                        <td>{{ ucfirst($bill->status) }}</td>
                        <td>{{ $bill->PaymentDate }}</td>
                        <td>
                            <form action="{{ route('admin.bills.update.status', $bill->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status"
                                    value="{{ $bill->status == 'paid' ? 'not paid' : 'paid' }}">
                                <button type="submit" class="btn btn-warning">
                                    {{ $bill->status == 'paid' ? 'غير مدفوعة' : 'مدفوعة' }}
                                </button>
                            </form>
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
    <h2>إدارة الفواتير</h2>
    <a href="{{ route('admin.bills.create') }}" class="btn btn-success">إضافة فاتورة جديدة</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المستخدم</th>
                <th>المبلغ</th>
                <th>حالة الدفع</th>
                <th>تاريخ الاستحقاق</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->patient->user->name }}</td>
                    <td>{{ $bill->amount }}</td>
                    <td>{{ ucfirst($bill->status) }}</td>
                    <td>{{ $bill->PaymentDate }}</td>
                    <td>
                        <form action="{{ route('admin.bills.update.status', $bill->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ $bill->status == 'paid' ? 'not paid' : 'paid' }}">
                            <button type="submit" class="btn btn-warning">
                                {{ $bill->status == 'paid' ? 'غير مدفوعة' : 'مدفوعة' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
 --}}
