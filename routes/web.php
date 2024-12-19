<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/update', function () {
    return view('updatePassword');
})->name('password.update');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/billet', function () {
    return view('billet');
})->name('billetterie.submit');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/vuebillet', function () {
    return view('vuebillet');
})->name('vuebillet');

Route::get('/carte', function () {
    return view('carte');
})->name('carte');

Route::get('/biomes', function () {
  return view('biome');
})->name('Biomes');

