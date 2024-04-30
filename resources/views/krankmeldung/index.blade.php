@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($krankmeldungen as $krankmeldung)
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        Krankmeldung für {{ $krankmeldung->patient->vorname }} {{ $krankmeldung->patient->nachname }}
                    </div>
                    <div class="card-body">
                        <p><strong>Datum:</strong> {{ $krankmeldung->start_date }} bis {{ $krankmeldung->end_date }}</p>
                        <p><strong>Grund:</strong> {{ $krankmeldung->reason }}</p>
                        <p><strong>Versicherungsnummer:</strong> {{ $krankmeldung->patient->versicherungsnummer }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
