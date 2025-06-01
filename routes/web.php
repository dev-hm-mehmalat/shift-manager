<?php
use App\Http\Controllers\RemitController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Startseite mit Demo-Remits
Route::get('/', function () {
    $remits = [
        ['title' => 'Startseite Remit A'],
        ['title' => 'Startseite Remit B'],
    ];
    return view('welcome', compact('remits'));
});

// Kalender-Route MUSS VOR der resource('shift') stehen
Route::get('/shift/calendar', [ShiftController::class, 'calendar'])->name('shift.calendar');

// Dashboard (geschützt)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Remit-Routen (CRUD)
Route::resource('remit', RemitController::class);

// Shift-Routen (CRUD)
Route::resource('shift', ShiftController::class);

// Auth & Profil-Routen (geschützt)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel Auth-Routen (Breeze, Fortify, etc.)
require __DIR__.'/auth.php';