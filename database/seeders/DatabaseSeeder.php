<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Administrator;
use App\Models\MedicalRecord;
use App\Models\Patient_Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(4)->create();

        // DB::table('patient__doctors')->insert([
        //     'patient_id' => 200022,
        //     'doctor_id' => 300019,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        Patient::factory(4)->create();
        Doctor::factory(4)->create();
        Appointment::factory(5)->create();
        MedicalRecord::factory(5)->create();
        Administrator::factory(5)->create();
        Payment::factory(5)->create();
        Notification::factory(5)->create();
       // Patient_Doctor::factory(5)->create();
    }
}
