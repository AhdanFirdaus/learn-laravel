@extends('layouts.master')

@section('konten')
    <h1>Detail produk</h1>

    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>

        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
            <p>Nama produk : {{$produk->nama_produk}}</p>
            <p>Harga : Rp.{{$produk->harga}}</p>
            <p>Deskripsi : {{$produk->deskripsi_produk}}</p>
            <p>Kategori : Barang Elektronik</p>
            <p>Stok : Tersedia 3</p>
            <a href="/product" class="btn btn-primary">Kembali Ke Produk</a>
        </div>
    </div>
@endsection
