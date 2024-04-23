<!-- resources/views/rezept/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verschreibung anzeigen') }}</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $prescription->name }}</p>
                        <p><strong>Vorname:</strong> {{ $prescription->vorname }}</p>
                        <p><strong>Versicherungsnummer:</strong> {{ $prescription->versicherungsnummer }}</p>
                        <p><strong>Krankenkasse:</strong> {{ $prescription->krankenkasse }}</p>
                        <p><strong>Medikament:</strong> {{ $prescription->medikament }}</p>
                        <p><strong>Diagnose:</strong> {{ $prescription->diagnose }}</p>

                        @if ($prescription->qr_code_path)
                            <div class="text-center">
                            <img src="{{ asset($prescription->qr_code_path) }}" alt="QR-Code">
                            </div>
                        @else
                            <p class="text-center">QR-Code ist nicht verfügbar.</p>
                        @endif
                    </div>
                </div>
                 <!-- Zurück-Button -->
                 <div class="mt-3">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Zurück</a>
                </div>
            </div>
        </div>
    </div>
@endsection