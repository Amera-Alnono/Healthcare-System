<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // استرجاع المريض المرتبط بالمستخدم الحالي
    $patient = auth()->user();

   $appointments = auth()->user()->patient->appointments;

    return view('patient.dashboard', compact('patient','appointments'));
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
        $id=auth()->user()->id;

        return view('patient.update_patient');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $patient = Auth::user()->patient;

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient profile not found.');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'documents' => 'nullable',
        ]);

        // تحديث البيانات الشخصية
        auth()->user()->name = $request->name;
        auth()->user()->email = $request->email;
        $patient->phone = $request->phone;


        // رفع المستندات
        if ($request->hasFile('documents')) {
            $path = $request->file('documents')->store('documents');
            $patient->document = $path;
        }

        $patient->save();
        $appointments = auth()->user()->patient->appointments;

        return view('patient.dashboard',compact('patient','appointments'))->with('success', 'Your information has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
