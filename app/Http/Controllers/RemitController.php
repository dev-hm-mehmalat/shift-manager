<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remit;

class RemitController extends Controller
{
    // Alle Remits anzeigen (jetzt aus der DB)
    public function index()
    {
        $remits = Remit::all();
        return view('remit.index', compact('remits'));
    }

    // Formular für neues Remit anzeigen
    public function create()
    {
        return view('remit.create');
    }

    // Neues Remit speichern (in die DB)
    public function store(Request $request)
    {
        // Validierung
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        // Neues Remit anlegen
        Remit::create([
            'title' => $request->input('title')
        ]);
        return redirect()->route('remit.index')->with('success', 'Remit gespeichert!');
    }

    // Einzelnes Remit anzeigen
    public function show($id)
    {
        $remit = Remit::findOrFail($id);
        return view('remit.show', compact('remit'));
    }

    // Formular zum Bearbeiten anzeigen
    public function edit($id)
    {
        $remit = Remit::findOrFail($id);
        return view('remit.edit', compact('remit'));
    }

    // Änderungen speichern (in der DB)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $remit = Remit::findOrFail($id);
        $remit->update([
            'title' => $request->input('title')
        ]);
        return redirect()->route('remit.index')->with('success', 'Remit aktualisiert!');
    }

    // Remit löschen
    public function destroy($id)
    {
        $remit = Remit::findOrFail($id);
        $remit->delete();
        return redirect()->route('remit.index')->with('success', 'Remit gelöscht!');
    }
}