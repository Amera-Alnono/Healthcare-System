<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function showPatients()
{
    $doctor = auth()->user()->doctor;
    $patients = $doctor->patients;

    $newPatients = $patients->filter(function ($patient) {
        $firstAppointment = $patient->appointments->first();
        return  $firstAppointment->status === 'appointment';
    });


    $followUpPatients = $patients->filter(function ($patient) {
        $firstAppointment = $patient->appointments->first();
        return  $firstAppointment->status === 'follow-up';
    });
    return view('doctor.patients.index', compact('newPatients', 'followUpPatients'));
}


    public function createview(){
        $doctor = auth()->user()->doctor;
        $patients = Patient::all();
       // dd($patients);
        return view('doctor.patients.create-appointment' , compact('patients'));
    }

    public function createAppointment(Request $request)
    { //dd($request);
         $doctor = auth()->user()->doctor;
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
            $user=User::findOrFail($request->patient_id);
           // dd( $user->patient->id);
            // إذا لم يكن هناك تعارض، نقوم بحجز الموعد
            Appointment::create([
            'patient_id' => $user->patient->id, // المريض الحالي
            'doctor_id' => $doctor->id,
            'AppointmentDate' => $validated['AppointmentDate'],
            'AppointmentTime' => $validated['AppointmentTime'],
            'status' => $validated['status'],
            ]);

        DB::table('patient__doctors')->insert([
            'patient_id' => $user->patient->id, // المريض الحالي
            'doctor_id' =>auth()->user()->doctor->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('doctor.patients.index')->with('success', 'تم إضافة الموعد بنجاح');
    }






    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return'I am doctor';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
