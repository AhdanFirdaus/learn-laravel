@extends('layouts.master')

@section('konten')
<div class="card">
    <div class="card-header">Update data produk</div>
    <div class="card-body">
        <form action="/product/{{$data->id_produk}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-6">
                @if ($data->gambar == null)
                    <p>Gambar Tidak ada</p>
                @else
                    <img src="{{asset('gambar_produk/'. $data->gambar)}}" class="img-fluid" width="300" alt="">
                @endif
                    <div class="mb-3">
                        <label class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}">
                        <div class="form-text text-muted">*Isi bagian ini jika ingin mengganti gambar yang sudah ada.</div>
                        @error('gambar')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="{{$data->nama_produk}}">
                        @error('nama_produk')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input type="number" name="harga_produk" class="form-control" value="{{$data->harga}}">
                        @error('harga_produk')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{$data->stok}}">
                        @error('stok')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name='kategori'>
                            <option selected>Pilih Disini</option>
                            @foreach ($kategori as $item)
                                @if ($item->id_kategori == $data->kategori_id)
                                    <option value="{{ $item->id_kategori }}" selected>{{ $item->nama_kategori }}</option>
                                @else
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kategori')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" style="height: 100px">{{ $data->deskripsi_produk }}</textarea>
                        <label>Deskripsi Produk</label>
                    </div>
                    @error('deskripsi')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection