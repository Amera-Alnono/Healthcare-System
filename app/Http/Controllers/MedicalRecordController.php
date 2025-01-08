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

        $request->validate([
            'patient_id' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'prescription' => 'required',
        ]);
        $patient_email=$patient->email;
        $patient=$patient->patient->id;

        $diagnosis = MedicalRecord::create([
            'patient_id' => $patient,
            'doctor_id' => auth()->user()->doctor->id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'prescription' => $request->prescription,
        ]);//dd($patient_email);

        $doctorEmail=auth()->user()->email;

        // إرسال بريد إلكتروني للمريض
        $patient = $diagnosis->patient->user;

        Mail::raw('This is a test email', function ($message) use ($doctorEmail,$patient_email) {
            $message->from($doctorEmail, auth()->user()->name); // عنوان المرسل
            $message->to($patient_email);  // عنوان المستقبل
            $message->subject('Test Email');
        });
       // Mail::to($patient->email)->send(new DiagnosisNotification($diagnosis));


        return view('doctor.dashboard')->with('success', 'Diagnosis saved and sent to the patient!');
    }
}
