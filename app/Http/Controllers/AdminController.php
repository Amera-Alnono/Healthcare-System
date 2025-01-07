<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPatients()
    {
        $patients = Patient::all(); // عرض جميع المرضى
        return view('admin.patients_index', compact('patients'));
    }

    public function assignPatientId($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        if (!$patient->unique_patient_code) {
            $patient->unique_patient_code = 'P' . Str::random(8); // توليد معرف مريض فريد
            $patient->save();
        }

        return redirect()->route('admin.patients')->with('status', 'تم توليد معرف المريض بنجاح');
    }






    public function index()
    {
        return'I am admin';
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
