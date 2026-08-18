<?php

use Illuminate\Support\Facades\Route;

// ─── Public Routes ───
Route::get('/', \App\Livewire\Frontend\Home::class)->name('home');

// ─── Guest Routes (hanya untuk yang belum login) ───
Route::middleware('guest:customer')->group(function () {
    Route::get('/login', \App\Livewire\Frontend\Auth\Login::class)->name('customer.login');
    Route::get('/register', \App\Livewire\Frontend\Auth\Register::class)->name('customer.register');
});

// ─── Customer Logout ───
Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::guard('customer')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('home');
})->name('customer.logout');

// ─── Placeholder routes (akan diimplementasi nanti) ───
Route::get('/pelatihan/{id}', function () { return 'Detail Pelatihan'; })->name('trainings.show');
Route::get('/fasilitas/{id}', function () { return 'Detail Fasilitas'; })->name('facilities.show');
