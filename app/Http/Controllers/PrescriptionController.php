<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Storage;

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
        
        $prescription = Prescription::create($request->all());
        $formData = json_encode($prescription->toArray());
       
        Log::info('QR Code Data: ' . $formData);

        

        $qrCode = new QrCode($formData);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        
        // Überprüfen, ob das Schreiben des QR-Codes erfolgreich war
        if ($result !== null) {
            $qrCodePath = 'qrcodes/'.$prescription->id.'.png';
            $pngData = $result->getString(); // Wir verwenden getString(), um den PNG-Inhalt abzurufen
            
            // Speichern des PNG-Datenstroms
            Storage::put($qrCodePath, $pngData);
        
            return redirect()->back()->with('success', 'Prescription created successfully.');
        } else {
            // Fehlerbehandlung, falls das Schreiben des QR-Codes fehlschlägt
            return redirect()->back()->with('error', 'Failed to generate QR code.');
        }
    }
}