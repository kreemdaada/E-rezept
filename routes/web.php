<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

// Benutzerregistrierung
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Benutzeranmeldung
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rezept-Controller-Routen
Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->name('prescriptions.show');
#############################################################################################

// Route to show the form to create a new patient
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
// Route to store the new patient data
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
// Optional: Route to show all patients
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
#############################################################################################

// Rezept-Suchen und -Scannen Routen
Route::get('/rezepte-suchen', [PrescriptionController::class, 'search'])->name('prescriptions.search');
Route::get('scan/{id}', [PrescriptionController::class, 'scan'])->name('prescriptions.scan');
#############################################################################################

Route::get('/dashboard-arzt', [ArztDashboardController::class, 'index'])->name('dashboard-arzt');
Route::get('/dashboard-apotheke', [ApothekeDashboardController::class, 'index'])->name('dashboard-apotheke');
Route::get('/dashboard-krankenkasse', [KrankenkasseDashboardController::class, 'index'])->name('dashboard-krankenkasse');


// Existing route with ID
Route::get('scan/{id}', [PrescriptionController::class, 'scan'])->name('prescriptions.scan');

// Optional: Adding a route that does not require an ID, if your business logic allows it
#Route::get('scan/new', [PrescriptionController::class, 'scanNew'])->name('prescriptions.scan.new');
