<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $toko = [
            'nama_toko'=>'Mzhodesign',
            'alamat'=>'Semarang, Jawa Tengah',
            'type'=>'Digital'
        ];
        // $eloquent = product::get(); // query untuk mengambil semua data yang berada pada tb_produk
        // dd($eloquent); // untuk dump data, seperti var_dump di php

        // $queryBuilder = DB::table('tb_produk')->get(); // query untuk mengambil semua data yang berada pada tb_produk
        // dd($queryBuilder);

        $produk = product::get();
        return view('pages.produk.show', [
            'data_toko'=>$toko,
            'data_produk'=>$produk,
        ]);
    }

    public function addProduct(){
        return view('pages.addProduct');
    }
}
