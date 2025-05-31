{{-- resources/views/shift/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Schicht bearbeiten')

@section('content')
    <h1 class="mb-4">Schicht bearbeiten</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shift.update', $shift->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Mitarbeiter</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                <option value="">-- Bitte wählen --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $shift->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Typ</label>
            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                <option value="Früh"  {{ old('type', $shift->type)=='Früh' ? 'selected' : '' }}>Früh</option>
                <option value="Spät"  {{ old('type', $shift->type)=='Spät' ? 'selected' : '' }}>Spät</option>
                <option value="Nacht" {{ old('type', $shift->type)=='Nacht' ? 'selected' : '' }}>Nacht</option>
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start</label>
            <input type="datetime-local"
                   name="start_time"
                   id="start_time"
                   value="{{ old('start_time', \Carbon\Carbon::parse($shift->start_time)->format('Y-m-d\TH:i')) }}"
                   class="form-control @error('start_time') is-invalid @enderror"
                   required>
            @error('start_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Ende</label>
            <input type="datetime-local"
                   name="end_time"
                   id="end_time"
                   value="{{ old('end_time', \Carbon\Carbon::parse($shift->end_time)->format('Y-m-d\TH:i')) }}"
                   class="form-control @error('end_time') is-invalid @enderror"
                   required>
            @error('end_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="offen"      {{ old('status', $shift->status)=='offen' ? 'selected' : '' }}>offen</option>
                <option value="getauscht"  {{ old('status', $shift->status)=='getauscht' ? 'selected' : '' }}>getauscht</option>
                <option value="akzeptiert" {{ old('status', $shift->status)=='akzeptiert' ? 'selected' : '' }}>akzeptiert</option>
                <option value="abgelehnt"  {{ old('status', $shift->status)=='abgelehnt' ? 'selected' : '' }}>abgelehnt</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Notiz</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror">{{ old('note', $shift->note) }}</textarea>
            @error('note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Aktualisieren</button>
        <a href="{{ route('shift.index') }}" class="btn btn-secondary">Zurück</a>
    </form>
@endsection