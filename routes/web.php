<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RemitController;
use App\Http\Controllers\ShiftController;

// 1. Startseite (optional, mit Demo-Remits)
Route::get('/', function () {
    $remits = [
        ['title' => 'Startseite Remit A'],
        ['title' => 'Startseite Remit B'],
    ];
    return view('welcome', compact('remits'));
});

// 2. Remit-CRUD (alle Standard-REST-Routen)
Route::resource('remit', RemitController::class);

// 3. Shift-CRUD (alle Standard-REST-Routen)
Route::resource('shift', ShiftController::class);

// 4. Kalender-Route (muss **nach** der resource-Route stehen!)
Route::get('/shift/calendar', [ShiftController::class, 'calendar'])->name('shift.calendar');


