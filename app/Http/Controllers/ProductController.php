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
            'nama_produk' => 'required|min:8|max:12', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
        ], [
            'nama_produk.min' => 'nama produk minimal 8 karakter',
            'nama_produk.max' => 'nama produk maximal 12 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
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

    public function show($id)
    {
        // query atau perintah
        // eloquent orm
        $data = product::findOrFail($id);

        //query builder
        // DB::table('tb_produk')->where('id_produk', $id)->firstOrFail();

        return view('pages.produk.detail', [
            'produk'=>$data
        ]);
    }

    public function edit($id)
    {
        // mengambil 1 data spesifik dari id yang di kirimkan dari parameter
        $data = product::findOrFail($id);

        return view('pages.produk.edit', [
            'data' => $data,
        ]);
    }

    public function update($id, Request $request)
    {
        // validasi
        $request->validate([
            'nama_produk' => 'required|min:8', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
        ], [
            'nama_produk.min' => 'nama produk minimal 8 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
        ]);

        // query untuk simpan data yang telah kita update
        product::where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
        ]);

        return redirect('product')->with('message', 'data berhasil di edit');
    }
}
