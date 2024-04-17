<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Zeigt das Formular zur Erstellung eines neuen Patienten an.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('patienten.create');
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
            'name' => 'required|string|max:255',
            'vorname' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'nachname' => 'required|string|max:255',
            'geburtsdatum' => 'required|date',
            'adresse' => 'required|string|max:255',
            'versicherungsnummer' => 'required|string|max:255|unique:patients,versicherungsnummer',
            'notizen' => 'nullable|string',
        ]);

        // Speichern der Daten in der Datenbank
        Patient::create([
            'name' => $request->name,
            'vorname' => $request->vorname,
            'email' => $request->email,
            'nachname' => $request->nachname,
            'geburtsdatum' => $request->geburtsdatum,
            'adresse' => $request->adresse,
            'versicherungsnummer' => $request->versicherungsnummer,
            'notizen' => $request->notizen,
        ]);

        // Erfolgsnachricht oder Weiterleitung
        return redirect()->route('patienten.create')->with('success', 'Patient erfolgreich erstellt.');
    }
}
