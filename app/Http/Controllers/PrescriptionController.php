<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use Illuminate\Http\Request;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class PrescriptionController extends Controller
{
    // Zeigt alle Verschreibungen
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('rezept.index', compact('prescriptions'));
    }

    // Zeigt das Formular zum Erstellen einer neuen Verschreibung
    public function create()
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Arzt') {
            return redirect('/login')->withErrors(['error' => 'Nicht autorisiert. Nur Ärzte können Rezepte anlegen.']);
        }
        return view('rezept.create');
    }

    // Speichert eine neue Verschreibung in der Datenbank
    public function store(Request $request)
{
    if (!Auth::check() || Auth::user()->role->name !== 'Arzt') {
        return redirect('/login')->withErrors(['error' => 'Nicht autorisiert. Nur Ärzte können Rezepte erstellen.']);
    }

    $doctor_id= Auth::id();
    $request->validate([
        'name' => 'required|string|max:255',
        'vorname' => 'required|string|max:255',
        'versicherungsnummer' => 'required|string|max:255',
        'krankenkasse' => 'required|string|max:255',
        'neue_termin' => 'required|date',
        'medikament' => 'required|string',
        'diagnose' => 'required|string',
    ]);


    $patient = Patient::where('versicherungsnummer', $request->versicherungsnummer)->first();

    if (!$patient) {
        return back()->withErrors(['vorname' => 'Patient nicht gefunden. Bitte überprüfen Sie die eingegebenen Daten.']);
    }

    // Make sure to include 'user_id' here
    $prescription = Prescription::create([
        'user_id' => Auth::id(), // Ensure this line is correctly assigning the user_id
        'name' => $request->name,
        'vorname' => $request->vorname,
        'versicherungsnummer' => $request->versicherungsnummer,
        'krankenkasse' => $request->krankenkasse,
        'neue_termin' => $request->neue_termin,
        'medikament' => $request->medikament,
        'diagnose' => $request->diagnose,
        'patient_id' => $patient->id, 
        'doctor_id' => $doctor_id,
        
    ]);

    return redirect()->route('prescriptions.show', ['id' => $prescription->id]);
}

    // Zeigt eine spezifische Verschreibung anhand ihrer ID
    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
    
        // Überprüfe die Berechtigung des Benutzers
        if (Auth::user()->role->name === 'Krankenkasse' || Auth::user()->role->name === 'Apotheke' || Auth::user()->role->name === 'Arzt') {
            return view('rezept.show', compact('prescription'));
        } else {
            return redirect()->route('home')->with('error', 'Access Denied');
        }

        // Vorbereitung der Daten für den QR-Code
        $qrCodeData = [
            'name' => $prescription->name,
            'vorname' => $prescription->vorname,
            'versicherungsnummer' => $prescription->versicherungsnummer,
            'krankenkasse' => $prescription->krankenkasse,
            'medikament' => $prescription->medikament,
            'diagnose' => $prescription->diagnose,
        ];

         // Logging der QR-Code-Daten
        Log::info('QR Code Data:', $qrCodeData);

        
        // Erstellung des QR-Codes
        $qrCode = new QrCode(json_encode($qrCodeData));
        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getString();
        
        // Speicherung des QR-Codes und Update des Pfads in der Datenbank
        $qrCodePath = 'qr-codes/qr-code-' . $prescription->id . '.png';
        file_put_contents(public_path($qrCodePath), $qrCodeImage);
        $prescription->update(['qr_code_path' => $qrCodePath]);

        return view('rezept.show', compact('prescription'));
    }

    // Methode für das Scannen von QR-Codes (zeigt alle Verschreibungen)
    public function scan($id)
    {
        $prescriptions = Prescription::all();
        return view('rezept.scan', compact('prescriptions'));
    }
}
