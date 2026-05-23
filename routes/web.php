<?php

use App\Http\Controllers\KategoriController;
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
Route::get('/product', [ProductController::class, 'index']); // read data menampilkan data
Route::get('/product/create', [ProductController::class, 'create']); // menampilkan halaman form data
Route::post('/product', [ProductController::class, 'store']); // untuk mengolah data yang telah dikirim dari form data
Route::get('/product/{id}', [ProductController::class, 'show']); // untuk menampilkan halaman detail data
Route::get('/product/{id}/edit', [ProductController::class, 'edit']); // menampilkan halaman form edit data
Route::put('/product/{id}', [ProductController::class, 'update']); // untuk mengolah data yang telah dikirim dari form edit data
Route::delete('/product/{id}', [ProductController::class, 'destroy']); // method untuk menjalankan fungsi hapus data

Route::resource('kategori', KategoriController::class); // membuat routing menggunakan resource