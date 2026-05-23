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

Route::get('/product/create', [ProductController::class, 'create']); // menampilkan halaman form data
Route::post('/product', [ProductController::class, 'store']); // untuk mengelola data yang telah dikirm dari halaman form data
Route::get('/product/{id}', [ProductController::class, 'show']); // menampilkan 1 data detail

Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);

Route::delete('/product/{id}', [ProductController::class, 'destroy']);