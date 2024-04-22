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
                <!-- resources/views/partials/navbar.blade.php -->

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <!-- Dynamische Links basierend auf Benutzerrolle -->
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
                @endif

                <!-- Logout Link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <!-- Login und Registrierung Links -->
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
