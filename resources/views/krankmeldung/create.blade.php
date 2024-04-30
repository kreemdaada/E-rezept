@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Neue Krankmeldung erstellen</div>

                <div class="card-body">
                    <!-- Überprüfung, ob der Benutzer die erforderliche Rolle hat -->
                    @if(Auth::check() && Auth::user()->role->name === 'Arzt')
                    <form action="{{ route('krankmeldungen.store') }}" method="POST"> <!-- Angepasst nach Routennamen -->
                        @csrf
                        <div class="form-group">
                            <label for="patient_id">Patient:</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->vorname }} {{ $patient->nachname }} ({{ $patient->versicherungsnummer }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Startdatum:</label>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Enddatum:</label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reason">Grund:</label>
                            <textarea name="reason" id="reason" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Krankmeldung erstellen</button>
                    </form>
                    @else
                    <p>Sie haben nicht die Berechtigung, Krankmeldungen zu erstellen.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
