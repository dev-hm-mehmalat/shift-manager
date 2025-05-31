<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\User;

class ShiftController extends Controller
{
    /**
     * Zeige alle Schichten (Index).
     */
    public function index()
    {
        $shifts = Shift::with('user')->orderBy('start_time', 'desc')->get();
        return view('shift.index', compact('shifts'));
    }

    /**
     * Zeige das Formular für eine neue Schicht.
     */
    public function create()
    {
        $users = User::all(); // Mitarbeiter-Auswahl
        return view('shift.create', compact('users'));
    }

    /**
     * Speichere eine neue Schicht in der Datenbank.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'type'       => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'status'     => 'required|in:offen,getauscht,akzeptiert,abgelehnt',
            'note'       => 'nullable|string',
        ]);

        Shift::create($validated);

        return redirect()->route('shift.index')->with('success', 'Schicht gespeichert!');
    }

    /**
     * Zeige eine einzelne Schicht.
     */
    public function show($id)
    {
        $shift = Shift::with('user')->findOrFail($id);
        return view('shift.show', compact('shift'));
    }

    /**
     * Zeige das Formular zum Bearbeiten einer Schicht.
     */
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        $users = User::all();
        return view('shift.edit', compact('shift', 'users'));
    }

    /**
     * Speichere die Änderungen an einer Schicht.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'type'       => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'status'     => 'required|in:offen,getauscht,akzeptiert,abgelehnt',
            'note'       => 'nullable|string',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($validated);

        return redirect()->route('shift.index')->with('success', 'Schicht aktualisiert!');
    }

    /**
     * Lösche eine Schicht.
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift.index')->with('success', 'Schicht gelöscht!');
    }

    /**
     * Kalenderansicht aller Schichten.
     */
    public function calendar()
    {
        $shifts = Shift::with('user')->orderBy('start_time')->get();
        return view('shift.calendar', compact('shifts'));
    }
}