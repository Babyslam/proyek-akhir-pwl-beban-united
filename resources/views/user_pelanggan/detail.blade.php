@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Pelanggan
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Pelanggan : </b>{{$Pelanggan->id_pelanggan}}</li>
                        <li class="list-group-item"><b>Nama Pelanggan : </b>{{$Pelanggan->nama}}</li>
                        <li class="list-group-item"><b>Foto : </b>{{$Pelanggan->foto}}</li>
                        <li class="list-group-item"><b>Jenis Kelamin : </b>{{$Pelanggan->jk}}</li>
                        <li class="list-group-item"><b>Alamat : </b>{{$Pelanggan->alamat}}</li>
                        <li class="list-group-item"><b>Tanggal Lahir : </b>{{$Pelanggan->tgl}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('user_pelanggan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection