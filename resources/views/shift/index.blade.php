@extends('layouts.app')

@section('title', 'Schichtplan Übersicht')

@section('content')
    <h1>Schichtplan Übersicht</h1>
    <a href="{{ route('shift.create') }}" class="btn btn-primary mb-3">+ Neue Schicht</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($shifts))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mitarbeiter</th>
                    <th>Typ</th>
                    <th>Start</th>
                    <th>Ende</th>
                    <th>Status</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $shift)
                    <tr>
                        <td>{{ $shift->user->name ?? 'unbekannt' }}</td>
                        <td>{{ $shift->type }}</td>
                        <td>{{ $shift->start_time->format('d.m.Y H:i') }}</td>
                        <td>{{ $shift->end_time->format('d.m.Y H:i') }}</td>
                        <td>{{ ucfirst($shift->status) }}</td>
                        <td>
                            <a href="{{ route('shift.show', $shift->id) }}" class="btn btn-info btn-sm">Anzeigen</a>
                            <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-warning btn-sm">Bearbeiten</a>
                            <form action="{{ route('shift.destroy', $shift->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">Keine Schichten vorhanden.</p>
    @endif
@endsection