{{-- resources/views/remit/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Remit bearbeiten')

@section('content')
    <h1 class="mb-4">Remit bearbeiten</h1>

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

    <form action="{{ route('remit.update', $remit->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title', $remit->title) }}"
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- Falls du weitere Felder hast (amount, remit_date, description), hier ergänzen! --}}
        <button type="submit" class="btn btn-primary">Aktualisieren</button>
        <a href="{{ route('remit.index') }}" class="btn btn-secondary">Zurück zur Übersicht</a>
    </form>
@endsection