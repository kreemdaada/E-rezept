<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Helper function to redirect based on role
    protected function redirectToBasedOnRole($roleName)
    {
        switch ($roleName) {
            case 'Arzt':
                return '/dashboard-arzt'; // Dashboard path for Arzt
            case 'Krankenkasse':
                return '/dashboard-krankenkasse'; // Dashboard path for Krankenkasse
            case 'Apotheke':
                return '/dashboard-apotheke'; // Dashboard path for Apotheke
            default:
                return '/home'; // Default redirection
        }
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $role = Role::where('name', $request->role)->first();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id, 
        ]);

        Auth::login($user);
        return redirect($this->redirectToBasedOnRole($role->name));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return redirect($this->redirectToBasedOnRole($user->role->name));
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/register');
    }
}
