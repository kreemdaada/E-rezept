<!-- resources/views/rezept/scan.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Rezepte scannen</h1>
                <ul class="list-group">
                @foreach ($prescriptions as $prescription)
                    <div>
                        <h3>{{ $prescription->vorname }}</h3>
                        <img src="{{ $prescription->qr_code_url }}" alt="QR-Code">
                    </div>
                @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
