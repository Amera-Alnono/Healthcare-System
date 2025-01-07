<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
     // عرض جميع الفواتير
     public function index()
     {
         $bills = Payment::all();
         //dd($bills[0]->patient->user->name);
         return view('admin.bills.index', compact('bills'));
     }



     // إضافة فاتورة جديدة
     public function create()
     {
         $users = User::where('user_type','patient')->get(); // استرجاع جميع المستخدمين
         return view('admin.bills.create', compact('users'));
     }

     public function store(Request $request)
     { $user = User::find($request->patient_id);
        //dd($user->patient->id);
         $request->validate([
             'patient_id' => 'required',
             'amount' => 'required|numeric',
             'status' => 'required|in:paid,unpaid',
             'PaymentDate' => 'required|date',
         ]);

        Payment::create([
            'patient_id'=>$user->patient->id,
            'amount'=>$request->amount,
            'status'=>$request->status,
            'PaymentDate'=>$request->PaymentDate,

        ]);
         //$bill->patient_id=$user->patient->id;

         return redirect()->route('admin.bills.index')->with('status', 'تم إضافة الفاتورة بنجاح');
     }

     // تعديل حالة الفاتورة
     public function updateStatus(Request $request, $id)
     {
         $bill = Payment::findOrFail($id);
         $bill->status = $request->status;
         $bill->save();

         return redirect()->route('admin.bills.index')->with('status', 'تم تحديث حالة الفاتورة');
     }
}
