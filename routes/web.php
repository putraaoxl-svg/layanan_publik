<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Frontend\Home::class)->name('home');

// Placeholder routes untuk mencegah error route() di blade
Route::get('/login', function () { return 'Login Page'; })->name('customer.login');
Route::get('/register', function () { return 'Register Page'; })->name('customer.register');
Route::get('/pelatihan/{id}', function () { return 'Detail Pelatihan'; })->name('trainings.show');
Route::get('/fasilitas/{id}', function () { return 'Detail Fasilitas'; })->name('facilities.show');
