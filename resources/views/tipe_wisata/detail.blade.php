@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Tipe Wisata
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Tipe : </b>{{$tipe_wisatas->id_tipe}}</li>
                        <li class="list-group-item"><b>Nama Tipe Wisata : </b>{{$tipe_wisatas->nama_tipe_wisata}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('tipe_wisata.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection