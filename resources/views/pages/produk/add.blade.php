@extends('layouts.master')

@section('konten')
<div class="card">
    <div class="card-header">tambah data produk</div>
    <div class="card-body">
        <form action="/product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}">
                        @error('gambar')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="{{old('nama_produk')}}">
                        @error('nama_produk')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input type="number" name="harga_produk" class="form-control" value="{{old('harga_produk')}}">
                        @error('harga_produk')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{old('stok')}}">
                        @error('stok')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name='kategori'>
                            <option value="">Pilih Disini</option>
                            @foreach ($data as $item)
                                <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <label class="mb-2">Deskripsi Produk</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" style="height: 100px">{{ old('deskripsi') }}</textarea>
                    </div>
                    @error('deskripsi')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection