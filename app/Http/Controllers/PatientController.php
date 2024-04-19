<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{

    /**
     * Zeigt das Formular zur Erstellung eines neuen Patienten an.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $krankenkassen = DB::table('insurance_numbers')->get();
        return view('patienten.create', ['krankenkassen' => $krankenkassen]);
    }

    /**
     * Speichert die Daten eines neuen Patienten.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validierung der Eingaben
        $request->validate([
            'vorname' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'nachname' => 'required|string|max:255',
            'geburtsdatum' => 'required|date',
            'adresse' => 'required|string|max:255',
            'versicherungsnummer' => 'required|string|max:255|unique:patients,versicherungsnummer',
            'krankenkasse' => 'required|string|max:255', // Hinzufügen der Validierung für die Krankenkasse
        ]);
    
        // Speichern der Daten in der Datenbank
        Patient::create([
            'vorname' => $request->vorname,
            'email' => $request->email,
            'nachname' => $request->nachname,
            'geburtsdatum' => $request->geburtsdatum,
            'adresse' => $request->adresse,
            'versicherungsnummer' => $request->versicherungsnummer,
            'krankenkasse' => $request->krankenkasse, // Hinzufügen der Krankenkasse zum Speichern
        ]);
    
        // Erfolgsnachricht oder Weiterleitung
        return redirect()->route('home')->with('success', 'Patient erfolgreich erstellt.');
    }
    
}
