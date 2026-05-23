<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko'=>'Mzhodesign',
            'alamat'=>'Semarang, Jawa Tengah',
            'type'=>'Digital'
        ];
        // $eloquent = product::get(); // query untuk mengambil semua data yang berada pada tb_produk
        // dd($eloquent); // untuk dump data, seperti var_dump di php

        // $queryBuilder = DB::table('tb_produk')->get(); // query untuk mengambil semua data yang berada pada tb_produk
        // dd($queryBuilder);

        $search = $request->keyword;

        $produk = product::when($search, function($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%");
        })
        ->join('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id_kategori')
        ->get();
        return view('pages.produk.show', [
            'data_toko'=>$toko,
            'data_produk'=>$produk,
        ]);
    }

    public function create(){
        $data_kategori = kategori::get();
        return view('pages.produk.add', [
            'data' => $data_kategori
        ]);
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nama_produk' => 'required|min:8|max:12', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2000',
        ], [
            'nama_produk.min' => 'nama produk minimal 8 karakter',
            'nama_produk.max' => 'nama produk maximal 12 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
            'gambar.mimes' => 'gambar hanya boleh dengan format jpg,png,jpeg',
        ]);

        $namaFile = Str::random(5) . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('gambar_produk'), $namaFile);

        // untuk menambahkaan dataa ke tb_produk
        // DB::table('tb_produk')->create([]);
        // query tambah data
        product::create([
            'kode_produk' => Str::random(5),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $namaFile,
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
        $data_kategori = kategori::get();

        return view('pages.produk.edit', [
            'data' => $data,
            'kategori'=>$data_kategori
        ]);
    }

    public function update($id, Request $request)
    {
        // validasi
        $request->validate([
            'nama_produk' => 'required|min:8', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2000',
        ], [
            'nama_produk.min' => 'nama produk minimal 8 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
        ]);

        if($request->hasFile('gambar')){
            $namaFile = Str::random(5).'.'.$request->gambar->extension();
            $request->gambar->move(public_path('gambar_produk'),$namaFile);
        }else{
            $data_lama = Product::findOrFail($id);
            $namaFile = $data_lama->gambar;
        }

        // query untuk simpan data yang telah kita update
        product::where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $namaFile,
        ]);

        return redirect('product')->with('message', 'data berhasil di edit');
    }

    public function destroy($id){
        // quuery untuk menghapus data di database
        product::findOrFail($id)->delete();
        return redirect('/product')->with('message','data berhasil di hapus');
    }
}
