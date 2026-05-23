@extends('layouts.master')

@section('konten')
    <h1>Daftar produk kami</h1>
    <hr>
    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="alert alert-primary">
        <b>Nama Toko : {{$data_toko['nama_toko']}}</b>
        <br>
        <b>Alamat : {{$data_toko['alamat']}}</b>
        <br>
        <b>Tipe Toko : {{$data_toko['type']}}</b>
    </div>
    @if (session('message'))
    <div class="alert alert-primary">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Produk
            <div class="d-flex gap-2">
            @if (request()->keyword != '')
                <a href="/product" class="btn btn-info">Reset</a>
            @endif
            <form class="input-group" style="width: 350px">
                <input type="text" name="keyword" value="{{Request()->keyword}}" class="form-control" placeholder="Cari data produk">
                <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
            </form>
            </div>
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
                    @forelse ($data_produk as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->nama_produk}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->deskripsi_produk}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_produk}}">
                                Hapus Data
                                </button>
                                <a href="/product/{{$item->id_produk}}/edit" class="btn btn-warning">Edit</a>
                                <a href="/product/{{$item->id_produk}}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data yang anda cari tidak ada!!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    @foreach ($data_produk as $item)
    <!-- Modal -->
    <div class="modal fade" id="hapus{{$item->id_produk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/product/{{$item->id_produk}}" method="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi!!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus produk <b>{{$item->nama_produk}}</b>??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
