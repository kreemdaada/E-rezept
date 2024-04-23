<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 
use App\Models\Prescription; // Import des Prescription Modells

class KrankenkasseDashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Krankenkasse') {
            return redirect()->route('home')->with('error', 'Access Denied');
        }

        $prescriptions = Prescription::all(); // Direktes Abrufen aller Verschreibungen
        return view('dashboard-krankenkasse', compact('prescriptions'));
    }
}
