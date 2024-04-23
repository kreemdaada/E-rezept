@php
    use Illuminate\Support\Facades\Auth;

    // It's best practice to move logic out of views. Consider fetching necessary data in the controller.
    $prescriptionCount = Auth::user()->prescriptions->count(); // Example of getting count of prescriptions
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">{{ __('Krankenkasse Dashboard') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</h5>
                    <p class="card-text">Explore your administrative options:</p>
                    <div class="list-group mb-3">
                    @php
                            $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
                        @endphp
                        @if ($prescriptionId)
                            <a class="list-group-item list-group-item-action" href="{{ route('prescriptions.scan', ['id' => $prescriptionId]) }}">Rezepte scannen</a>
                        @else
                            <div class="list-group-item">{{ __('No prescriptions available to scan.') }}</div>
                        @endif
                    
                    <div class="mb-3">
                        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Alle Patienten anzeigen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
