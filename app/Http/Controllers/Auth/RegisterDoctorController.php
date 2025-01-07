<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterDoctorController extends Controller
{
    public function showForm()
    {
        return view('auth.register-doctor');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone'=>'required',
            'specialty'=>'required',
            'address'=>'required',
            'RegistrationDate'=>'required',

        ]);

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'doctor', // تعيين النوع كدكتور
        ]);

        if ($user->user_type === 'doctor') {
            $p=Doctor::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->address,
            'specialty'=>$request->specialty,
            'RegistrationDate' => $request->RegistrationDate,
            ]);
        };

       // return $user;

        return redirect()->route('doctor.patients.index')->with('success', 'Doctor registered successfully.');
    }
}
