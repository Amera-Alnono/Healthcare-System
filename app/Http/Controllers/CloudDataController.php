<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class CloudDataController extends Controller
{
    public function index()
    {
        // تأكد أن المستخدم الحالي لديه صلاحيات كمدير
       // $this->authorize('viewAny', Patient::class);

        // جلب جميع بيانات المرضى والأطباء
        $patients = Patient::all();
        $doctors = Doctor::all();

        // dd($patients[0]->patient);


        return view('cloud-data.index', compact('patients', 'doctors'));
    }

    /**
     * تعديل بيانات السحاب.
     */
    public function edit($id, $type)
    { //dd($id);
       // $this->authorize('update', Patient::class);
       // dd($id, $type);
        if ($type === 'patient') {
            $record = User::findOrFail($id);
        } elseif ($type === 'doctor') {
            $record = User::findOrFail($id);
        } else {
            abort(404, 'Invalid type');
        }

        return view('cloud-data.edit', compact('record', 'type'));
    }

    /**
     * تحديث البيانات.
     */
    public function update(Request $request, $id, $type)
    {
       // $this->authorize('update', Patient::class);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);//dd($type);

        if ($type === 'patient') {
            $record = User::findOrFail($id);

        } elseif ($type === 'doctor') {
            $record = User::findOrFail($id);
        } else {
            abort(404, 'Invalid type');
        }

        $record->update($validated);

        return redirect()->route('cloud.data.index')->with('success', 'Data updated successfully.');
    }

    /**
     * حذف بيانات.
     */
    public function destroy($id, $type)
    {
      //  $this->authorize('delete', Patient::class);

      if ($id === 'patient') {
        $record = User::findOrFail($type);
    } elseif ($id === 'doctor') {
        $record = User::findOrFail($type);
    } else {
        abort(404, 'Invalid type');
    }

        $record->delete();

        return redirect()->route('cloud.data.index')->with('success', 'Data deleted successfully.');
    }
}
