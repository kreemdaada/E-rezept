<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {  // Überprüft, ob der Benutzer nicht angemeldet ist
            return redirect('/login')->with('error', 'Sie müssen sich anmelden, um auf diese Seite zugreifen zu können.');
        }

        return $next($request);
    }
}

