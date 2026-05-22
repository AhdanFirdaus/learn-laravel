<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(){
        $data_toko = [
            'nama_toko'=>'Mzhodesign',
            'alamat'=>'Semarang, Jawa Tengah',
            'type'=>'Digital'
        ];
        return view('pages.product', $data_toko);
    }

    public function addProduct(){
        return view('pages.addProduct');
    }
}
