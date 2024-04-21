<!-- resources/views/rezept/show.blade.php -->

<h1>Verschreibung anzeigen</h1>

<p>Name: {{ $prescription->name }}</p>
<p>Vorname: {{ $prescription->vorname }}</p>
<p>Versicherungsnummer: {{ $prescription->versicherungsnummer }}</p>
<p>Krankenkasse: {{ $prescription->krankenkasse }}</p>
<p>Medikament: {{ $prescription->medikament }}</p>
<p>Diagnose: {{ $prescription->diagnose }}</p>

<img src="{{ asset($prescription->qr_code_path) }}" alt="QR-Code">
