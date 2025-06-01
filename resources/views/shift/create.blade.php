@extends('layouts.app')

@section('title', 'Schicht erstellen')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 p-8 rounded-xl shadow-lg mt-8">

    <h1 class="text-3xl font-bold mb-6 text-center">Schicht erstellen</h1>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-500/10 border border-red-400 text-red-700 dark:text-red-300 rounded">
            <strong>Bitte korrigiere folgende Fehler:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('shift.store') }}" novalidate>
        @csrf

        {{-- Mitarbeiter --}}
        <div class="mb-4">
            <label for="user_id" class="block font-semibold mb-1">Mitarbeiter</label>
            <select id="user_id" name="user_id"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Bitte wählen --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Typ --}}
        <div class="mb-4">
            <label for="type" class="block font-semibold mb-1">Typ</label>
            <select name="type" id="type"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Bitte wählen --</option>
                <option value="Früh"  {{ old('type') == 'Früh' ? 'selected' : '' }}>Früh</option>
                <option value="Spät"  {{ old('type') == 'Spät' ? 'selected' : '' }}>Spät</option>
                <option value="Nacht" {{ old('type') == 'Nacht' ? 'selected' : '' }}>Nacht</option>
            </select>
            @error('type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Startzeit --}}
        <div class="mb-4">
            <label for="start_time" class="block font-semibold mb-1">Start</label>
            <input type="datetime-local" name="start_time" id="start_time"
                value="{{ old('start_time') }}"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('start_time')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Endzeit --}}
        <div class="mb-4">
            <label for="end_time" class="block font-semibold mb-1">Ende</label>
            <input type="datetime-local" name="end_time" id="end_time"
                value="{{ old('end_time') }}"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('end_time')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-4">
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select name="status" id="status"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Bitte wählen --</option>
                <option value="offen"      {{ old('status') == 'offen' ? 'selected' : '' }}>offen</option>
                <option value="getauscht"  {{ old('status') == 'getauscht' ? 'selected' : '' }}>getauscht</option>
                <option value="akzeptiert" {{ old('status') == 'akzeptiert' ? 'selected' : '' }}>akzeptiert</option>
                <option value="abgelehnt"  {{ old('status') == 'abgelehnt' ? 'selected' : '' }}>abgelehnt</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Notiz --}}
        <div class="mb-6">
            <label for="note" class="block font-semibold mb-1">Notiz</label>
            <textarea name="note" id="note" rows="3"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Optional">{{ old('note') }}</textarea>
            @error('note')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('shift.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                Zurück zur Übersicht
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                Speichern
            </button>
        </div>
    </form>
</div>
@endsection