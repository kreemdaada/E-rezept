<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <!-- Dynamic links based on user role -->
                    @if (Auth::user()->role->name === 'Arzt')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescriptions.create') }}">Neues Rezept anlegen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patients.create') }}">Neuen Patienten anlegen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescriptions.index') }}">Alle Rezepte anzeigen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patients.store') }}">Alle Patienten anzeigen</a>
                        </li>
                    @elseif (Auth::user()->role->name === 'Krankenkasse' || Auth::user()->role->name === 'Apotheke')
                        @php
                            $firstPrescription = Auth::user()->prescriptions->first();
                        @endphp
                        <li class="nav-item">
                            @if ($firstPrescription)
                                <a class="nav-link" href="{{ route('prescriptions.scan', ['id' => $firstPrescription->id]) }}">Rezepte scannen</a>
                            @else
                                <a class="nav-link disabled" href="#" title="Keine Rezepte verfügbar zum Scannen">Rezepte scannen (Nicht verfügbar)</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patients.search') }}">Patienten suchen</a>
                        </li>
                    @endif

                    <!-- Logout Link -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <!-- Login and Registration Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>


            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Hier kannst du deine JavaScript-Dateien einbinden -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
