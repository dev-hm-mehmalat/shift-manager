<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RemitController;
use App\Http\Controllers\ShiftController;

// 1. Startseite
Route::get('/', function () {
    $remits = [
        ['title' => 'Startseite Remit A'],
        ['title' => 'Startseite Remit B'],
    ];
    return view('welcome', compact('remits'));
});

// 2. ✅ Kalenderroute MUSS VOR der resource-Route stehen!
Route::get('/shift/calendar', [ShiftController::class, 'calendar'])->name('shift.calendar');

// 3. Remit CRUD
Route::resource('remit', RemitController::class);

// 4. Shift CRUD
Route::resource('shift', ShiftController::class);