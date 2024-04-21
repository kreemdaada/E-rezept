<!-- resources/views/qrcode/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>QR-Code anzeigen</h1>
        <img src="{{ route('qr_code.show', $prescription->id) }}" alt="QR-Code">
    </div>
@endsection
