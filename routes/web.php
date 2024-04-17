<?php


namespace App\Http\Controllers;

use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Benutzerregistrierung
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
#----------------------------------------------------------------------

// Benutzeranmeldung
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
#----------------------------------------------------------------------

Route::get('/home', [HomeController::class, 'index'])->name('home');
#----------------------------------------------------------------------

Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');

Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
#----------------------------------------------------------------------
Route::get('/patienten/create', [PatientController::class, 'create'])->name('patienten.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
#----------------------------------------------------------------------
