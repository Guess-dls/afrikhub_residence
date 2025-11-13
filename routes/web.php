<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/inscription', function () {
    return view('auth.inscription');
})->name('inscription');
