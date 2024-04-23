<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
                return '/'; // Default redirection
        }
    }


    #----------------------------------------------------------------

public function index()
{
    // Ensure the user is logged in and has the correct role
    if (!Auth::check() || Auth::user()->role->name !== 'Krankenkasse') {
        return redirect()->route('home')->with('error', 'Access Denied');
    }

    $prescriptions = Auth::user()->prescriptions; // Fetch prescriptions associated with the user.

    return view('dashboard-krankenkasse', compact('prescriptions'));
}
#-----------------------------------------------------------

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

       // Check if the role exists
    $role = Role::where('name', $request->role)->first();
    if (!$role) {
        return back()->withErrors(['role' => 'Role does not exist.']);
    }

    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id, 
        ]);
    
        Auth::login($user);
        Log::info('New user registered and logged in', ['user_id' => $user->id]);
        return redirect($this->redirectToBasedOnRole($role->name));
    } catch (\Exception $e) {
        Log::error('User registration failed', [
            'error' => $e->getMessage(),
            'email' => $request->email,  // Log the email to identify the failed registration attempt
        ]);
        return back()->withErrors(['error' => 'Failed to create user. Please try again.']);
    }
}
##########################################
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect($this->redirectToBasedOnRole(Auth::user()->role->name));
        }
        return view('auth.login');
    }
##########################################
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
        return redirect('/login');
    }
}
