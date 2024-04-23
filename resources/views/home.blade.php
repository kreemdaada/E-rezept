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
                            <!-- Arzt-specific functionalities -->
                            <ul class="list-group">
                                <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.create') }}">Neues Rezept anlegen</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('patients.create') }}">Neuen Patienten anlegen</a></li>
                            </ul>
                            
                            @php
                                $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
                            @endphp
                            <ul class="list-group">
                                @if ($prescriptionId)
                                    <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.show', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                                @else
                                    <li class="list-group-item">{{ __('No prescriptions available to scan.') }}</li>
                                @endif
                                <li><a class="list-group-item list-group-item-action" href="{{ route('patients.store') }}">Patienten suchen</a></li>
                            </ul>
                        @endif
                    @else
                    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    @endif

                    <p>{{ __('Current Date and Time: :date', ['date' => now()->format('d.m.Y H:i:s')]) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
