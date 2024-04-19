<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use Illuminate\Http\Request;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Response;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('rezept.index', compact('prescriptions'));
    }

    public function create()
    {
        return view('rezept.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vorname' => 'required|string|max:255',
            'versicherungsnummer' => 'required|string|max:255',
            'krankenkasse' => 'required|string|max:255',
            'neue_termin' => 'required|date',
            'medikament' => 'required|string',
            'diagnose' => 'required|string',
        ]);
    
        // Patienten anhand der Versicherungsnummer finden
        $patient = Patient::where('versicherungsnummer', $request->versicherungsnummer)->first();

    
        if ($patient) {
            // Verschreibung in der Datenbank speichern und patient_id hinzufügen
            $prescription = Prescription::create([
                'name' => $request->name,
                'vorname' => $request->vorname,
                'versicherungsnummer' => $request->versicherungsnummer,
                'krankenkasse' => $request->krankenkasse,
                'neue_termin' => $request->neue_termin,
                'medikament' => $request->medikament,
                'diagnose' => $request->diagnose,
                'patient_id' => $patient->id,
            ]);
    
            // QR-Code für die neu erstellte Verschreibung generieren und anzeigen
            return redirect()->route('prescriptions.show', $prescription->id);
        } else {
            // Wenn der Patient nicht gefunden wurde, Fehlermeldung anzeigen
            return redirect()->back()->withErrors(['vorname' => 'Patient nicht gefunden.']);
        }
    }
    
    
    public function show($id)
    {
        // Daten für den QR-Code aus der Datenbank holen
        $prescription = Prescription::findOrFail($id);
        $formData = json_encode($prescription->toArray());

        // QR-Code erstellen
        $qrCode = new QrCode($formData);

        // QR-Code in eine Datei schreiben
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // QR-Code als Antwort senden
        return Response::make($result->getString(), 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="qrcode.png"',
        ]);
    }
}
