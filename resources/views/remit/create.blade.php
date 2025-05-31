{{-- resources/views/remit/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Neues Remit erstellen')

@section('content')
    <h1 class="mb-4">Neues Remit erstellen</h1>

    {{-- Fehleranzeige --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('remit.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   id="title"
                   name="title"
                   value="{{ old('title') }}"
                   required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Betrag (€)</label>
            <input type="number"
                   step="0.01"
                   class="form-control @error('amount') is-invalid @enderror"
                   id="amount"
                   name="amount"
                   value="{{ old('amount') }}">
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="remit_date" class="form-label">Datum</label>
            <input type="date"
                   class="form-control @error('remit_date') is-invalid @enderror"
                   id="remit_date"
                   name="remit_date"
                   value="{{ old('remit_date') }}">
            @error('remit_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description"
                      name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Speichern</button>
        <a href="{{ route('remit.index') }}" class="btn btn-secondary">Zurück zur Übersicht</a>
    </form>
@endsection