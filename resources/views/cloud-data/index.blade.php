@extends('admin.dashboard')
@section('content_page')
<div class="container">
    <h2>إدارة البيانات السحابية</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-4">
        <h3>المرضى</h3>
        <table  class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->user->name }}</td>
                        <td>{{ $patient->user->email }}</td>
                        <td>
                            <a href="{{ route('cloud.data.edit', ['id' => $patient->user->id , 'type' =>  $patient->user->user_type ]) }}" class="btn btn-warning">تعديل</a>
                            <form action="{{ route('cloud.data.destroy', ['id' =>  $patient->user->id  , 'type' => $patient->user->user_type ]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row mt-4">
        <h3>الأطباء</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->user->name }}</td>
                        <td>{{ $doctor->user->email }}</td>
                        <td>
                            <a href="{{ route('cloud.data.edit',['id' => $doctor->user->id , 'type' => $doctor->user->user_type ]) }}" class="btn btn-warning">تعديل</a>
                            <form action="{{ route('cloud.data.destroy', ['id' => $doctor->user->id , 'type' => $doctor->user->user_type ]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

