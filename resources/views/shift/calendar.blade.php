{{-- resources/views/shift/calendar.blade.php --}}
@extends('layouts.app')

@section('title', 'Schicht-Kalender')

@section('content')
    <h1>Schicht-Kalender</h1>

    @if($shifts->count())
        <ul class="list-group">
            @foreach($shifts as $shift)
                <li class="list-group-item">
                    <strong>{{ $shift->user->name ?? 'Unbekannt' }}</strong> - {{ $shift->type }}<br>
                    Start: {{ $shift->start_time->format('d.m.Y H:i') }}<br>
                    Ende: {{ $shift->end_time->format('d.m.Y H:i') }}<br>
                    Status: {{ ucfirst($shift->status) }}<br>
                    Notiz: {{ $shift->note ?? '-' }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Keine Schichten geplant.</p>
    @endif
@endsection