<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{

    public function index(Request $request)
{
    $query = Patient::query();

    // Überprüfung, ob ein Geburtsdatum als Suchbegriff übergeben wurde
    if ($request->has('geburtsdatum') && $request->geburtsdatum) {
        $query->whereDate('geburtsdatum', $request->geburtsdatum);
    }

    // Patienten abrufen
    $patients = $query->get();

    // Daten an die View übergeben
    return view('patients.store', compact('patients'));
}

    /**
     * Zeigt das Formular zur Erstellung eines neuen Patienten an.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $krankenkassen = DB::table('insurance_numbers')->get();
        return view('patients.create', ['krankenkassen' => $krankenkassen]);
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
            'krankenkasse' => 'required|string|max:255',
            'prescription_id' => 'exists:prescriptions,id'
        ]);
    
        // Speichern der Daten in der Datenbank
        Patient::create([
            'vorname' => $request->vorname,
            'email' => $request->email,
            'nachname' => $request->nachname,
            'geburtsdatum' => $request->geburtsdatum,
            'adresse' => $request->adresse,
            'versicherungsnummer' => $request->versicherungsnummer,
            'krankenkasse' => $request->krankenkasse,
            'prescription_id' => $request->prescription_id
        ]);
    
        // Erfolgsnachricht oder Weiterleitung
        return redirect()->route('patients.index')->with('success', 'Patient erfolgreich erstellt.');
    }
    
}
