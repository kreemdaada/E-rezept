@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Geplante Videoanrufe</h1>
    <div class="list-group">
        @foreach ($videoanrufe as $videoanruf)
            <div class="list-group-item">
                <h5 class="mb-1">Videoanruf mit: {{ $videoanruf->patient->vorname }} {{ $videoanruf->patient->nachname }}</h5>
                <p class="mb-1">Geplant von: {{ $videoanruf->start_time }} bis {{ $videoanruf->end_time }}</p>
                <p class="mb-1">Beschreibung: {{ $videoanruf->description }}</p>
                <a href="{{ route('videoanrufe.issue_sick_note', $videoanruf->id) }}" class="btn btn-primary">Krankmeldung ausstellen</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
