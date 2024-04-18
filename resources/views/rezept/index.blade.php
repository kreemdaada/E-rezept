<!-- resources/views/rezept/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Prescriptions</h1>
                <ul>
                    @foreach($prescriptions as $prescription)
                        <li>
                            {{ $prescription->name }}
                            <a href="{{ route('prescriptions.show', $prescription->id) }}">QR-Code anzeigen</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
