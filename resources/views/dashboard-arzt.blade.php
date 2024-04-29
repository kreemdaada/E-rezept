@php
   
    $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
@endphp


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Arzt Dashboard') }}</div>
                <div class="card-body">
                    @if (Auth::check())  {{-- Check if user is logged in --}}
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
                            <ul class="list-group">
                            @if($prescriptionId)
                                <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                            @endif
                            </ul>
                            <a class="list-group-item list-group-item-action" href="{{ route('prescriptions.index') }}">Alle Rezepte anzeigen</a>
                            </li>
                            <li class="list-group-item list-group-item-action">
                            <a class="nav-link" href="{{ route('patients.index') }}">Alle Patienten anzeigen</a>
                            </li>

                           @endif
                    <div class="mb-4">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); 
                           document.getElementById('logout-form').submit();"
                           class="btn btn-danger">{{ __('Logout') }}</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>

                    </div>
                    // arzt-dashboard.blade.php

<a class="list-group-item list-group-item-action" href="{{ route('krankmeldungen.create') }}">Neue Krankmeldung anlegen</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
