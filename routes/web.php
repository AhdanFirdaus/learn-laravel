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

Route::get('/product', [ProductController::class, 'getProduct']);
Route::get('/product/add', [ProductController::class, 'addProduct']);
