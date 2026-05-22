<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
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

    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi' => 'required',
        ]);

        // untuk menambahkaan dataa ke tb_produk
        // DB::table('tb_produk')->create([]);
        // query tambah data
        product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
            'kategori_id' => '1'
        ]);

        // setelah data berhasil di tambah, akan mengarahkan ke halaman /product dan memberikan notif berhasil menambahkan data
        return redirect('/product')->with('message', 'berhasil menambahkan data');
    }
}
