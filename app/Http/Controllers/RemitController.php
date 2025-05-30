<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemitController extends Controller
{
    // Dummy-Daten als Platzhalter
    private $remits = [
        ['id' => 1, 'title' => 'Rechnung 001'],
        ['id' => 2, 'title' => 'Rechnung 002'],
        ['id' => 3, 'title' => 'Rechnung 003'],
    ];

    // Alle Remits anzeigen
    public function index()
    {
        $remits = $this->remits;
        return view('remit.index', compact('remits'));
    }

    // Formular für neues Remit anzeigen
    public function create()
    {
        return view('remit.create');
    }

    // Neues Remit speichern (Dummy-Logik)
    public function store(Request $request)
    {
        // Normalerweise würdest du hier validieren und in die DB speichern
        // Dummy: Zeige die Daten an
        $title = $request->input('title');
        // Nach dem Speichern umleiten (später zu DB ergänzen)
        return redirect()->route('remit.index')->with('success', 'Remit gespeichert: ' . $title);
    }

    // Einzelnes Remit anzeigen
    public function show($id)
    {
        // Dummy-Suche (normalerweise DB)
        $remit = collect($this->remits)->firstWhere('id', $id);
        if (!$remit) {
            abort(404);
        }
        return view('remit.show', compact('remit'));
    }

    // Formular zum Bearbeiten anzeigen
    public function edit($id)
    {
        $remit = collect($this->remits)->firstWhere('id', $id);
        if (!$remit) {
            abort(404);
        }
        return view('remit.edit', compact('remit'));
    }

    // Änderungen speichern (Dummy)
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        // Hier würdest du updaten in der DB
        return redirect()->route('remit.index')->with('success', 'Remit aktualisiert: ' . $title);
    }

    // Remit löschen (Dummy)
    public function destroy($id)
    {
        // Hier würdest du aus der DB löschen
        return redirect()->route('remit.index')->with('success', 'Remit gelöscht');
    }
}