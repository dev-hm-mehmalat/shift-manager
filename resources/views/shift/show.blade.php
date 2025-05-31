@extends('layouts.app')

@section('title', 'Schicht Details')

@section('content')
    <h1>Schicht Details</h1>
    <div class="mb-3"><b>Mitarbeiter:</b> {{ $shift->user->name ?? 'unbekannt' }}</div>
    <div class="mb-3"><b>Typ:</b> {{ $shift->type }}</div>
    <div class="mb-3"><b>Start:</b> {{ $shift->start_time }}</div>
    <div class="mb-3"><b>Ende:</b> {{ $shift->end_time }}</div>
    <div class="mb-3"><b>Status:</b> {{ $shift->status }}</div>
    <div class="mb-3"><b>Notiz:</b> {{ $shift->note }}</div>

    <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-warning">Bearbeiten</a>
    <a href="{{ route('shift.index') }}" class="btn btn-secondary">Zurück zur Übersicht</a>
@endsection