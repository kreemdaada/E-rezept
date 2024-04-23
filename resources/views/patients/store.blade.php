@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patientenliste</h1>
    
    <!-- Suchformular beginnt hier -->
    <form method="GET" action="{{ route('patients.store') }}">
        <div class="form-group">
            <label for="geburtsdatum">Geburtsdatum:</label>
            <input type="date" id="geburtsdatum" name="geburtsdatum" class="form-control" value="{{ request('geburtsdatum') }}">
            <button type="submit" class="btn btn-primary mt-2">Suchen</button>
        </div>
    </form>
    <!-- Suchformular endet hier -->

    @if($patients->isEmpty())
        <p>Keine Patienten gefunden.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Email</th>
                    <th>Geburtsdatum</th>
                    <th>Adresse</th>
                    <th>Versicherungsnummer</th>
                    <th>Krankenkasse</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->nachname }}</td>
                    <td>{{ $patient->vorname }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($patient->geburtsdatum)->format('d.m.Y') }}</td>
                    <td>{{ $patient->adresse }}</td>
                    <td>{{ $patient->versicherungsnummer }}</td>
                    <td>{{ $patient->krankenkasse }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
                 <div class="mt-3">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Zurück</a>
                </div>
</div>
@endsection
