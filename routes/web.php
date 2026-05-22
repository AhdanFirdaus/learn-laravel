<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});
Route::get('/about', function () {
    $biodata = [
        'nama' => 'ahdan',
        'umur' => 18,
        'alamat' => 'Indonesia'
    ];
    return view('pages.about', $biodata);
});

Route::view('/contact','pages.contact');

// satu controller banyak method
Route::get('/product', [ProductController::class, 'index']); // read data

Route::get('/product/add', [ProductController::class, 'addProduct']);
