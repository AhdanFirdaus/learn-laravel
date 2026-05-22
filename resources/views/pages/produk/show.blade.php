@extends('layouts.master')

@section('konten')
    <h1>Daftar produk kami</h1>
    <hr>
    <a href="/product/add" type="button" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="alert alert-primary">
        <b>Nama Toko : {{$data_toko['nama_toko']}}</b>
        <br>
        <b>Alamat : {{$data_toko['alamat']}}</b>
        <br>
        <b>Tipe Toko : {{$data_toko['type']}}</b>
    </div>
    <div class="card">
        <div class="card-header">
            Daftar Produk
        </div>
        <div class="card-body">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_produk as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->nama_produk}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->deskripsi_produk}}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
