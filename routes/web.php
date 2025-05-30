<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RemitController;

// 1. Startseite mit Beispieldaten (optional)
Route::get('/', function () {
    $remits = [
        ['title' => 'Startseite Remit A'],
        ['title' => 'Startseite Remit B'],
    ];
    return view('welcome', compact('remits'));
});

// 2. Remit-Seite mit Controller
Route::get('/remit', [RemitController::class, 'index']);Route::resource('remit', RemitController::class);
Route::resource('remit', RemitController::class);
