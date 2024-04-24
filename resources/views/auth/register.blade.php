@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Rollenauswahl -->
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control" name="role" required>
                                        <option value="Arzt">Arzt</option>
                                        <option value="Apotheke">Apotheke</option>
                                        <option value="Krankenkasse">Krankenkasse</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Ende Rollenauswahl -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ablauf des E-Rezept-Prozesses -->

    <div class="container mt-5">
        <h3 class="text-center mb-4">Ablauf des E-Rezept-Prozesses</h3>
       <h5><p class="text-center">Das E-Rezept ist ein elektronisches Rezept, das von einem Arzt ausgestellt und elektronisch an eine Apotheke oder Krankenkasse übermittelt wird. Hier ist ein vereinfachter Ablauf des Prozesses:</p></h5>
        <ul class="list-group list-group-flush mx-auto" style="max-width: 800px;">
            <li class="list-group-item bg-light mb-3">
                <h5>Arztbesuch:</h5>
                <p>Der Patient besucht einen Arzt für eine Konsultation und erhält eine Verschreibung für Medikamente.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>Erstellung des E-Rezepts:</h5>
                <p>Der Arzt erstellt ein elektronisches Rezept in einem digitalen System, das alle relevanten Informationen enthält, einschließlich des Patientennamens, der verschriebenen Medikamente, der Dosierung und anderer Anweisungen.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>QR-Code-Erzeugung:</h5>
                <p>Basierend auf den Informationen im E-Rezept wird ein QR-Code generiert, der alle relevanten Daten kodiert.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>Übermittlung an die Krankenkasse:</h5>
                <p>Das E-Rezept und der zugehörige QR-Code werden elektronisch an die Krankenkasse des Patienten gesendet. Die Krankenkasse überprüft die Informationen und genehmigt die Kostenübernahme für die verschriebenen Medikamente.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>Weiterleitung an die Apotheke:</h5>
                <p>Nach der Genehmigung leitet die Krankenkasse das E-Rezept an die ausgewählte Apotheke des Patienten weiter.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>Verarbeitung in der Apotheke:</h5>
                <p>Die Apotheke empfängt das E-Rezept und den QR-Code, überprüft die Informationen und bereitet die Medikamente für den Patienten vor.</p>
            </li>
            <li class="list-group-item bg-light mb-3">
                <h5>Abholung oder Lieferung:</h5>
                <p>Der Patient kann die Medikamente entweder persönlich in der Apotheke abholen oder sie werden ihm nach Hause geliefert, je nach den Dienstleistungen der Apotheke.</p>
            </li>
        </ul>
    </div>

    <!-- Hinweis für Registrierung -->
    <div class="container mt-5">
        <h3 class="text-center">Hinweis zur Registrierung</h3>
       <h2> <p class="text-center">Nur Ärzte dürfen Rezepte und Patienten anlegen. Apotheken und Krankenkassen dürfen nur Rezepte einsehen und nach Patienten suchen.</p></h2>
    </div>
@endsection
