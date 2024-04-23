@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Prescriptions</h1>
                <div class="list-group">
                    @forelse($prescriptions as $prescription)
                        <a href="{{ route('prescriptions.show', $prescription->id) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $prescription->name }}</h5>
                                <small>QR-Code anzeigen</small>
                            </div>
                            <p class="mb-1">Versicherungsnummer: {{ $prescription->versicherungsnummer }}</p>
                            <small>Medikament: {{ $prescription->medikament }}</small>
                        </a>
                    @empty
                        <p>Noch keine Verschreibungen vorhanden.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="btn btn-secondary">Zurück</a>
            </div>
        </div>
    </div>
@endsection
