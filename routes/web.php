<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CloudDataController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterAdminController;
use App\Http\Controllers\Auth\RegisterDoctorController;
use App\Http\Controllers\MedicalRecordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//register Doctor and admin
Route::middleware(['auth', 'can:register-doctor'])->get('/register-doctor', [RegisterDoctorController::class, 'showForm'])->name('register.doctor.form');
Route::middleware(['auth', 'can:register-doctor'])->post('/register-doctor', [RegisterDoctorController::class, 'register'])->name('register.doctor');

Route::middleware(['auth', 'can:register-admin'])->get('/register-admin', [RegisterAdminController::class, 'showForm'])->name('register.admin.form');
Route::middleware(['auth', 'can:register-admin'])->post('/register-admin', [RegisterAdminController::class, 'register'])->name('register.admin');

Route::prefix('admin')->middleware('auth', 'can:admin')->group(function () {
    Route::get('/patients', [AdminController::class, 'showPatients'])->name('admin.patients');
    Route::get('/patients/{patientId}/assign', [AdminController::class, 'assignPatientId'])->name('admin.assignPatientId');
    // عرض جميع الفواتير
    Route::get('/billing', [BillingController::class, 'index'])->name('admin.bills.index');

    // إضافة فاتورة جديدة
    Route::get('/billing/create', [BillingController::class, 'create'])->name('admin.bills.create');
    Route::post('/billing', [BillingController::class, 'store'])->name('admin.bills.store');

    // عرض تفاصيل الفاتورة
    Route::get('/billing/{id}', [BillingController::class, 'show'])->name('admin.bills.show');

    // تحديث حالة الفاتورة
    Route::put('/billing/{id}/status', [BillingController::class, 'updateStatus'])->name('admin.bills.update.status');

});

Route::middleware(['auth', 'cloud.data'])->group(function () {
    Route::get('/cloud-data', [CloudDataController::class, 'index'])->name('cloud.data.index');
    Route::get('/cloud-data/{id}/{type}/edit', [CloudDataController::class, 'edit'])->name('cloud.data.edit');
    Route::post('/cloud-data/{id}/{type}/update', [CloudDataController::class, 'update'])->name('cloud.data.update');
    Route::delete('/cloud-data/{type}/{id}', [CloudDataController::class, 'destroy'])->name('cloud.data.destroy');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::post('/patients/update', [PatientController::class, 'update'])->name('patients.update');

});




// Route لعرض الأطباء
Route::middleware('auth')->get('/choose-doctor', [AppointmentController::class, 'chooseDoctor'])->name('choose.doctor');
// Route لعرض التفاصيل الخاصة بالطبيب وحجز الموعد
Route::middleware('auth')->get('/book-appointment/{doctor}', [AppointmentController::class, 'showAppointmentForm'])->name('book.appointment.form');
// Route لحجز الموعد
Route::middleware('auth')->post('/book-appointment/{doctor}', [AppointmentController::class, 'bookAppointment'])->name('book.appointment');
//عرض المواعيد
Route::middleware('auth')->get('/appointment', [AppointmentController::class, 'index'])->name('appointments.index');



Route::middleware(['auth'])->group(function () {

    Route::get('/doctor/create_Appointment', [DoctorController::class, 'createview'])->name('createAppointmentForm');
    Route::post('/doctor/create_Appointment', [DoctorController::class, 'createAppointment'])->name('doctor.patients.createAppointment');
    Route::get('/doctor/dashboard', [DoctorController::class, 'showPatients'])->name('doctor.patients.index');
    Route::get('/doctor/create_diagnosis', [MedicalRecordController::class, 'create'])->name('diagnoses.create');
    Route::post('/doctor/create_diagnosis', [MedicalRecordController::class, 'store'])->name('diagnoses.store');
});

Route::middleware(['auth', 'user.type'])->get('/dashboard', function () {
    return view('dashboard');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
