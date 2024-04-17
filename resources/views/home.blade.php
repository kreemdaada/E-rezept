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
                                <ul>
                                <li><a href="{{ route('prescriptions.create') }}">Neue Rezept anlegen</a></li>
                                <li><a href="{{ route('patienten.create') }}">Neuen Patienten anlegen</a></li>
                                    <li><a href="#">Rezepte scannen</a></li>
                                    <li><a href="#">Patienten suchen</a></li>
                                </ul>
                            @elseif (Auth::user()->role->name === 'Apotheke')
                                <p>{{ __('You are logged in as Apotheke.') }}</p>
                                <!-- Apotheke-spezifische Funktionen -->
                                <ul>
                                    <li><a href="#">Rezepte scannen</a></li>
                                    <li><a href="#">Patienten suchen</a></li>
                                </ul>
                            @elseif (Auth::user()->role->name === 'Krankenkasse')
                                <p>{{ __('You are logged in as Krankenkasse.') }}</p>
                                <!-- Krankenkasse-spezifische Funktionen -->
                                <ul>
                                    <li><a href="#">Rezepte scannen</a></li>
                                    <li><a href="#">Patienten suchen</a></li>
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
