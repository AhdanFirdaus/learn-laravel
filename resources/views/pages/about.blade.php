@extends('layouts.master')

@section('konten')
    <h1>Tentang Kami</h1>
    <div class="card">
        <div class="card-body">
            selamat datang {{$nama}}, umur mu {{$umur}} dari {{$alamat}}
        </div>
    </div>
@endsection