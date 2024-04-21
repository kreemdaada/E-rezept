<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Zeige das Registrierungsformular an
    public function showRegistrationForm()
    {
        

        // Rollen abrufen
        $roles = Role::all();
        
        // Registrierungsformular mit Rollen und Standard-Krankenkassen-Daten anzeigen
        return view('auth.register', compact('defaultKrankenkassen'));
    }

    // Verarbeite die Registrierungsanfrage
    public function register(Request $request)
    {
        // Validierung der Eingaben
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

    // Benutzer erstellen
    $role = Role::where('name', $request->role)->first();
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => $role->id, 
    ]);

    // Anmeldung des Benutzers
    auth()->login($user);

        // Weiterleitung je nach Benutzerrolle
        return redirect('/login');
    }

    // Zeige das Anmeldeformular an
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Verarbeite die Anmeldeanfrage
    public function login(Request $request)
    {
        // Validierung der Eingaben
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Authentifizierung des Benutzers
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Weiterleitung je nach Benutzerrolle
            return redirect('/home');

        } else {
            // Ungültige Anmeldeinformationen
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
