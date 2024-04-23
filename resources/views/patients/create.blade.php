<!-- resources/views/patienten/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Neuen Patienten anlegen') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('patients.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="vorname">{{ __('Vorname:') }}</label>
                                <input type="text" name="vorname" id="vorname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail:') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nachname">{{ __('Nachname:') }}</label>
                                <input type="text" name="nachname" id="nachname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="geburtsdatum">{{ __('Geburtsdatum:') }}</label>
                                <input type="date" name="geburtsdatum" id="geburtsdatum" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="adresse">{{ __('Adresse:') }}</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="versicherungsnummer">{{ __('Versicherungsnummer:') }}</label>
                                <input type="text" name="versicherungsnummer" id="versicherungsnummer" class="form-control" required>
                            </div>

                            
                            <div class="form-group">
                            <label for="krankenkasse">{{ __('Krankenkasse:') }}</label>
                            <input type="text" name="krankenkasse" id="krankenkasse" class="form-control" required>
                           </div>

                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Neuen Patienten anlegen') }}</button>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Zurück</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
