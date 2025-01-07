<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Mail\DiagnosisNotification;
use Illuminate\Support\Facades\Mail;

class MedicalRecordController extends Controller
{
    public function create(){
        $patients = Patient::all();
        return view('doctor.create_diagnose', compact('patients'));
    }
    public function store(Request $request)
    {
        $patient=User::findOrFail($request->patient_id);
        //dd($patient->patient->id);

        $request->validate([
            'patient_id' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'prescription' => 'required',
        ]);

        $patient=$patient->patient->id;
        //dd($patient);

        $diagnosis = MedicalRecord::create([
            'patient_id' => $patient,
            'doctor_id' => auth()->user()->doctor->id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'prescription' => $request->prescription,
        ]);

        $doctorEmail=auth()->user()->email;
       // dd($doctorEmail);

        // إرسال بريد إلكتروني للمريض
        $patient = $diagnosis->patient->user;
        //dd($patient->email);

        Mail::raw('This is a test email', function ($message) use ($doctorEmail) {
            $message->from($doctorEmail, auth()->user()->name); // عنوان المرسل
            $message->to('patient_email@example.com');  // عنوان المستقبل
            $message->subject('Test Email');
        });
       // Mail::to($patient->email)->send(new DiagnosisNotification($diagnosis));


        return view('doctor.patients.index')->with('success', 'Diagnosis saved and sent to the patient!');
    }
}
