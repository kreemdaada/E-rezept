<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use App\Models\Krankmeldung; // Geändert von Krankmeldungen zu Krankmeldung

class KrankmeldungController extends Controller
{
    // Alle Krankmeldungen anzeigen
    public function index()
    {
        // Alle Krankmeldungen aus der Datenbank abrufen
        $krankmeldungen = Krankmeldung::all(); // Geändert zu Krankmeldung

        // Die View 'index.blade.php' mit den Krankmeldungen anzeigen
        return view('krankmeldung.index', compact('krankmeldungen'));
    }

    // Formular zur Erstellung einer neuen Krankmeldung anzeigen
    public function create()
    {
        // Alle Patienten aus der Datenbank abrufen
        $patients = Patient::all();

        // Die View 'create.blade.php' mit den Patienten anzeigen
        return view('krankmeldungen.create', compact('patients'));
    }

    // Neue Krankmeldung erstellen
    public function store(Request $request)
    {
        // Validierung der Eingabedaten
        $request->validate([
            'patient_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        // Überprüfen, ob der Benutzer die Rolle 'Arzt' hat
        if (Auth::user()->role->name !== 'Arzt') {
            return back()->withErrors(['error' => 'Nur Ärzte können Krankmeldungen erstellen.']);
        }

        // Krankmeldung in der Datenbank speichern
        Krankmeldung::create($request->all()); // Geändert zu Krankmeldung

        // Erfolgsmeldung anzeigen und zur Index-Seite weiterleiten
        return redirect()->route('krankmeldungen.index')
            ->with('success', 'Krankmeldung erfolgreich erstellt.');
    }

    // Eine bestimmte Krankmeldung anzeigen
    public function show(Krankmeldung $krankmeldung) // Parameter-Typ geändert
    {
        // Die View 'show.blade.php' mit der spezifischen Krankmeldung anzeigen
        return view('krankmeldungen.show', compact('krankmeldung'));
    }

    // Formular zur Bearbeitung einer Krankmeldung anzeigen
    public function edit(Krankmeldung $krankmeldung) // Parameter-Typ geändert
    {
        // Alle Patienten aus der Datenbank abrufen
        $patients = Patient::all();

        // Die View 'edit.blade.php' mit der spezifischen Krankmeldung und den Patienten anzeigen
        return view('krankmeldungen.edit', compact('krankmeldung', 'patients'));
    }

    // Krankmeldung aktualisieren
    public function update(Request $request, Krankmeldung $krankmeldung) // Parameter-Typ geändert
    {
        // Validierung der Eingabedaten
        $request->validate([
            'patient_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required',
        ]);

        // Krankmeldung in der Datenbank aktualisieren
        $krankmeldung->update($request->all());

        // Erfolgsmeldung anzeigen und zur Index-Seite weiterleiten
        return redirect()->route('krankmeldungen.index')
            ->with('success', 'Krankmeldung erfolgreich aktualisiert.');
    }

    // Krankmeldung löschen
    public function destroy(Krankmeldung $krankmeldung) // Parameter-Typ geändert
    {
        // Krankmeldung aus der Datenbank löschen
        $krankmeldung->delete();

        // Erfolgsmeldung anzeigen und zur Index-Seite weiterleiten
        return redirect()->route('krankmeldungen.index')
            ->with('success', 'Krankmeldung erfolgreich gelöscht.');
    }
}
