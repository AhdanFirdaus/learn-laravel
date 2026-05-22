<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});
Route::get('/about', function () {
    return view('pages.about');
});

Route::view('/contact','pages.contact');
