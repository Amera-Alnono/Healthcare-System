<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // في نموذج Doctor
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient__doctors', 'doctor_id', 'patient_id')->withTimestamps();
    }

    public function MedicalRecords()
    {
    return $this->hasMany(MedicalRecord::class);
    }


}
