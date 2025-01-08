<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient_Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
{
    $appointments = auth()->user()->patient->appointments; // مواعيد المريض
//dd($appointments[0]->doctor->user->name);
    return view('appointments.index', compact('appointments'));
}

    public function chooseDoctor(Request $request)
    {
        // جلب قائمة الأطباء من قاعدة البيانات (يمكنك إضافة تصنيف أو تخصص)
        $doctors = Doctor::all();
       // dd($doctors[0]->specialty);
       $specialty = $request->input('specialty');
       $doctors = Doctor::when($specialty, function ($query, $specialty) {
        return $query->where('specialty', $specialty);
    })->get();

        return view('appointments.choose-doctor', compact('doctors'));
    }

    public function showAppointmentForm(Doctor $doctor)
{
    return view('appointments.book-appointment', compact('doctor'));
}

public function bookAppointment(Request $request, Doctor $doctor)
{
    $validated = $request->validate([
        'AppointmentDate' => 'required',
        'AppointmentTime'=>'required',
        'status' => 'required',
    ]);

    // تحقق من تعارض الموعد
    $conflict = Appointment::where('doctor_id', $doctor->id)
        ->where('AppointmentDate', $validated['AppointmentDate'])
        ->where('AppointmentTime', $validated['AppointmentTime'])
        ->exists();

    if ($conflict) {
        return redirect()->back()->withErrors(['conflict' => 'الوقت الذي اخترته محجوز بالفعل، من فضلك اختر وقتًا آخر.']);
    }

    // إذا لم يكن هناك تعارض، نقوم بحجز الموعد
    Appointment::create([
        'patient_id' => auth()->user()->patient->id, // المريض الحالي
        'doctor_id' => $doctor->id,
        'AppointmentDate' => $validated['AppointmentDate'],
        'AppointmentTime' => $validated['AppointmentTime'],
        'status' => $validated['status'],
    ]);

    DB::table('patient__doctors')->insert([
        'patient_id' => auth()->user()->patient->id, // المريض الحالي
        'doctor_id' => $doctor->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);


    return redirect()->route('appointments.index')->with('success', 'تم حجز الموعد بنجاح!');
}


}
