<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remit;

class RemitController extends Controller
{
    // Zeigt alle Remits an
    public function index()
    {
        $remits = Remit::all();
        return view('remit.index', compact('remits'));
    }

    // Zeigt das Formular für ein neues Remit
    public function create()
    {
        return view('remit.create');
    }

    // Speichert ein neues Remit (mit Backend-Validierung)
    public function store(Request $request)
    {
        // --- BACKEND-VALIDIERUNG ---
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        // --------------------------

        // Speichern in der Datenbank
        Remit::create($validated);

        return redirect()->route('remit.index')->with('success', 'Remit gespeichert!');
    }

    // Zeigt ein einzelnes Remit an
    public function show($id)
    {
        $remit = Remit::findOrFail($id);
        return view('remit.show', compact('remit'));
    }

    // Zeigt das Bearbeitungsformular
    public function edit($id)
    {
        $remit = Remit::findOrFail($id);
        return view('remit.edit', compact('remit'));
    }

    // Speichert Änderungen (mit Backend-Validierung)
    public function update(Request $request, $id)
    {
        // --- BACKEND-VALIDIERUNG ---
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        // --------------------------

        $remit = Remit::findOrFail($id);
        $remit->update($validated);

        return redirect()->route('remit.index')->with('success', 'Remit aktualisiert!');
    }

    // Löscht ein Remit
    public function destroy($id)
    {
        $remit = Remit::findOrFail($id);
        $remit->delete();
        return redirect()->route('remit.index')->with('success', 'Remit gelöscht!');
    }
}