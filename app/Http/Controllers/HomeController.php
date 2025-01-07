<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth()->user()->user_type;


       if($user ==='admin'){
        return view('admin.dashboard');
       }

       if($user ==='doctor'){
         // الحصول على الطبيب الحالي عبر الـ auth()
            $doctor = auth()->user()->doctor;

            // جلب جميع المرضى المرتبطين بالطبيب
            $patients = $doctor->patients;
            //dd($patients);

            // تصنيف المرضى إلى مرضى جدد ومرضى متابعة
            $newPatients = $patients->filter(fn($patient) => !$patient->appointments->count()); // المرضى الجدد
            $followUpPatients = $patients->filter(fn($patient) => $patient->appointments->count()); // المرضى المتابعين

            // تمرير المرضى إلى واجهة العرض
            return view('doctor.dashboard', compact('newPatients', 'followUpPatients'));
       }

       if($user ==='patient'){

        $patient = auth()->user();

         $appointments = auth()->user()->patient->appointments;
       // dd(auth()->user());
//$appointments=null;
             return view('patient.dashboard', compact('patient','appointments'));
       }

        }
}
