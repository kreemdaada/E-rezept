<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Zeige die Startseite an.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prescriptionId = Prescription::where('doctor_id', Auth::id())->first()->id ?? null;
        return view('home', compact('prescriptionId'));
    }
    
}
