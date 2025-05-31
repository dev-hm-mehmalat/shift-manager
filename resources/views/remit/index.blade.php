{{-- resources/views/remit/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Remit Übersicht')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Remit Übersicht</h1>
        <a href="{{ route('remit.create') }}" class="btn btn-primary">+ Neues Remit</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($remits))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Betrag (€)</th>
                    <th>Datum</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($remits as $remit)
                    <tr>
                        <td>
                            <a href="{{ route('remit.show', $remit->id) }}">
                                {{ $remit->title }}
                            </a>
                        </td>
                        <td>{{ number_format($remit->amount, 2, ',', '.') ?? '-' }}</td>
                        <td>
                            {{ $remit->remit_date ? \Carbon\Carbon::parse($remit->remit_date)->format('d.m.Y') : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('remit.show', $remit->id) }}" class="btn btn-info btn-sm">Anzeigen</a>
                            <a href="{{ route('remit.edit', $remit->id) }}" class="btn btn-warning btn-sm">Bearbeiten</a>
                            <form action="{{ route('remit.destroy', $remit->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted mt-4">Keine Remits vorhanden.</p>
    @endif
@endsection