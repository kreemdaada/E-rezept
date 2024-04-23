<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $prescription = Prescription::where('doctor_id', Auth::id())->first();
    $prescriptionId = $prescription ? $prescription->id : null;
    return view('home', compact('prescriptionId'));
}
}

