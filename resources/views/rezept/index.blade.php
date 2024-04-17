<!-- resources/views/prescriptions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Prescriptions</h1>
                <ul>
                    @foreach($prescriptions as $prescription)
                        <li>{{ $prescription->name }}</li>
                        <!-- Hier weitere Felder der Verschreibung anzeigen -->
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
