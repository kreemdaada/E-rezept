<!-- resources/views/home.blade.php -->
@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                
                    @if (Auth::check())
                        <p>{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</p>
                        @if (Auth::user()->role->name === 'Arzt')
                            <p>{{ __('You are logged in as Arzt.') }}</p>
                            <!-- Arzt-spezifische Funktionen -->
                            <ul class="list-group">
                                <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.create') }}">Neues Rezept anlegen</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('patients.create') }}">Neuen Patienten anlegen</a></li>
                            </ul>
                            
                            <ul class="list-group">
                                <!-- Ensure prescriptionId is defined before using it in a route -->
                                @php
                                    $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
                                @endphp
                                @if ($prescriptionId)
                                    <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                                @else
                                    <li class="list-group-item">{{ __('No prescriptions available to scan.') }}</li>
                                @endif
                                <li><a class="list-group-item list-group-item-action" href="{{ route('patients.search') }}">Patienten suchen</a></li>
                            </ul>
                        @elseif (Auth::user()->role->name === 'Apotheke' || Auth::user()->role->name === 'Krankenkasse')
                            <p>{{ __('You are logged in as Apotheke.') }}</p>
                            <!-- Apotheke-spezifische Funktionen -->
                            <ul class="list-group">
                                <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan') }}">Rezepte scannen</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('patients.search') }}">Patienten suchen</a></li>
                            </ul>
                        @else
                            <p>{{ __('You are logged in with an unknown role.') }}</p>
                        @endif
                    @endif

                    <p>{{ __('Current Date and Time: :date', ['date' => now()->format('d.m.Y H:i:s')]) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
