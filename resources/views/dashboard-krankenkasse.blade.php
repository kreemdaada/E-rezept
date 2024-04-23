@php
   
    $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
@endphp


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Krankenkasse Dashboard') }}</div>
                <div class="card-body">
                    <p>{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</p>
                    <ul class="list-group">
                    @if($prescriptionId)
                        <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                    @endif
                    </ul>
                    <a class="nav-link" href="{{ route('prescriptions.index') }}">Alle Rezepte anzeigen</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                    <a class="nav-link" href="{{ route('patients.index') }}">Alle Patienten anzeigen</a>
                    </li>
                </div>
                <div class="mb-4">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); 
                           document.getElementById('logout-form').submit();"
                           class="btn btn-danger">{{ __('Logout') }}</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
