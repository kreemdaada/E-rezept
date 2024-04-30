@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Krankmeldungsdetails</div>

                <div class="card-body">

                    <p><strong>Startdatum:</strong> {{ $krankmeldung->start_date }}</p>
                    <p><strong>Enddatum:</strong> {{ $krankmeldung->end_date }}</p>
                    <p><strong>Grund:</strong> {{ $krankmeldung->reason }}</p>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
