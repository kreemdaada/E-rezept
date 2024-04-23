<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class ArztDashboardController extends Controller
{
    public function index()
    {
        // Return the dashboard view for 'Arzt'
        return view('dashboard-arzt');
    
    }
    public function arztDashboard() {
        $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
        return view('dashboard-arzt', compact('prescriptionId'));
    }
}
