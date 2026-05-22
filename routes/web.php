<?php

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

Route::get('/about/{id}/detail',function($id){
    return view('pages.detail', [
        'nomer'=>$id
    ]);
});

Route::view('/contact','pages.contact');
