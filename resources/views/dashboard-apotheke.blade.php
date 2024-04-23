@php
   
    $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
@endphp


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Apotheke Dashboard') }}</div>
                <div class="card-body">
                    <p>{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</p>
                    <ul class="list-group">
                    @if($prescriptionId)
                        <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                    @else
                        <li class="list-group-item">Keine Rezepte verfügbar zum Scannen.</li>
                    @endif
                    </ul>
                    <a class="nav-link" href="{{ route('prescriptions.index') }}">Alle Rezepte anzeigen</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('patients.index') }}">Alle Patienten anzeigen</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
