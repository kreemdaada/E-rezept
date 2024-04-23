<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApothekeDashboardController extends Controller
{
    //
    public function index()
{
    return view('dashboard-apotheke');
}
}
