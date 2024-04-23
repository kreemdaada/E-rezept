@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Arzt Dashboard') }}</div>
                <div class="card-body">
                    <p class="lead">{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</p>
                    <div class="list-group mb-4">
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('prescriptions.create') }}">
                            Neues Rezept anlegen
                            <span class="badge badge-primary badge-pill">+</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('patients.create') }}">
                            Neuen Patienten anlegen
                            <span class="badge badge-primary badge-pill">+</span>
                        </a>
                        @php
                            $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
                        @endphp
                        @if ($prescriptionId)
                            <a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a>
                        @else
                            <div class="list-group-item">{{ __('No prescriptions available to scan.') }}</div>
                        @endif
                        <a class="list-group-item list-group-item-action" href="{{ route('patients.store') }}">Patienten suchen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
