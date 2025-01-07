@extends('admin.dashboard')
@section('content_page')
<div class="container">
    {{-- <h2>تعديل بيانات {{ ucfirst($type) }}</h2> --}}

    <form action="{{ route('cloud.data.update', ['type' => $type, 'id' => $record->id]) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $record->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $record->email) }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">تحديث البيانات</button>
    </form>
</div>
@stop



