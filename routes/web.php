<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicalActionController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientRegistrationController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PaymentController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes with middleware for auth only (role middleware temporarily removed)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Master data routes
    Route::resource('regions', RegionController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('medical_actions', MedicalActionController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('patient_registrations', PatientRegistrationController::class);
    Route::resource('visits', VisitController::class);
    Route::resource('payments', PaymentController::class);

    // Additional routes for VisitController methods not covered by resource
    Route::post('visits/{visit}/add-action', [VisitController::class, 'addAction'])->name('visits.addAction');
    Route::post('visits/{visit}/add-medicine', [VisitController::class, 'addMedicine'])->name('visits.addMedicine');

    // New route for downloading the zip file
    Route::get('/download/clinic-inova-medika-fresh', [\App\Http\Controllers\DownloadController::class, 'downloadZip'])->name('download.zip');
});
