<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    // Dummy login action, redirect to dashboard
    return redirect()->route('dashboard');
})->name('login.post');

Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');

// Grouping routes that should normally be protected by auth middleware
Route::middleware([])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/attendance/scanner', function () {
        return view('attendance.scanner');
    })->name('attendance.scanner');
});
