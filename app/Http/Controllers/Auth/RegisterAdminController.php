<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function showForm()
    {
        return view('auth.register-admin');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

       $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'admin', // تعيين النوع كأدمن
        ]);

        if ($user->user_type === 'admin') {
       Administrator::create([
        'user_id' => $user->id,
    ]);}

        return redirect()->route('admin.dashboard')->with('success', 'Admin registered successfully.');
    }
}

