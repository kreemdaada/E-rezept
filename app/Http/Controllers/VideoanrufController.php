<?php
namespace App\Http\Controllers;

use App\Models\Videoanruf;
use App\Models\Patient;
use Illuminate\Http\Request;

class VideoanrufController extends Controller
{
    public function create(Request $request)
    {
        $videoanruf = Videoanruf::create($request->all());
        return redirect()->route('videoanrufe.index')->with('success', 'Videoanruf geplant.');
    }

    public function index()
    {
        $videoanrufe = Videoanruf::with('patient')->get();
        return view('videoanrufe.index', compact('videoanrufe'));
    }

    public function issueSickNote(Request $request, $videoanrufId)
    {
        $videoanruf = Videoanruf::findOrFail($videoanrufId);
        // Implementiere hier die Logik, um eine Krankmeldung zu erstellen
        return back()->with('success', 'Krankmeldung ausgestellt.');
    }
}
