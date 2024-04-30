@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Neuen Videoanruf planen</h1>
    <form method="POST" action="{{ route('videoanrufe.create') }}">
        @csrf
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient auswählen:</label>
            <select class="form-control" name="patient_id" id="patient_id">
                @foreach (App\Models\Patient::all() as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->vorname }} {{ $patient->nachname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Startzeit:</label>
            <input type="datetime-local" class="form-control" name="start_time" id="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Endzeit:</label>
            <input type="datetime-local" class="form-control" name="end_time" id="end_time" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung:</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Videoanruf planen</button>
    </form>
</div>
@endsection
