<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::get('/krankmeldungen', [KrankmeldungController::class, 'index'])->name('krankmeldungen.index');
    Route::get('/krankmeldungen/create', [KrankmeldungController::class, 'create'])->name('krankmeldungen.create');
    Route::post('/krankmeldungen', [KrankmeldungController::class, 'store'])->name('krankmeldungen.store');
    Route::get('/krankmeldungen/{krankmeldung}', [KrankmeldungController::class, 'show'])->name('krankmeldungen.show');
    Route::get('/krankmeldungen/{krankmeldung}/edit', [KrankmeldungController::class, 'edit'])->name('krankmeldungen.edit');
    Route::put('/krankmeldungen/{krankmeldung}', [KrankmeldungController::class, 'update'])->name('krankmeldungen.update');
    Route::delete('/krankmeldungen/{krankmeldung}', [KrankmeldungController::class, 'destroy'])->name('krankmeldungen.destroy');
});

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
Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->name('prescriptions.show');

// Patient-Controller-Routen
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

// Rezept-Suchen und -Scannen Routen
Route::get('/rezepte-suchen', [PrescriptionController::class, 'search'])->name('prescriptions.search');
#Route::get('scan/{id}', [PrescriptionController::class, 'scan'])->name('prescriptions.scan');
#############################################################################################

Route::get('/dashboard-arzt', [ArztDashboardController::class, 'index'])->name('dashboard-arzt');
Route::get('/dashboard-apotheke', [ApothekeDashboardController::class, 'index'])->name('dashboard-apotheke');
Route::get('/dashboard-krankenkasse', [KrankenkasseDashboardController::class, 'index'])->name('dashboard-krankenkasse');

Route::get('scan/{id}', [PrescriptionController::class, 'scan'])->name('prescriptions.scan');
###################################################################################################


############################################################################################################   