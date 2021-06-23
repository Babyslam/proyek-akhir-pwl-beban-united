@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Wisata
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Wisata : </b>{{$Wisata->id_wisata}}</li>
                        <li class="list-group-item"><b>Nama Wisata : </b>{{$Wisata->nama_wisata}}</li>
                        <li class="list-group-item"><b>Kabupaten : </b>{{$Wisata->kabupaten->nama_kabupaten}}</li>
                        <li class="list-group-item"><b>Kecamatan : </b>{{$Wisata->kecamatan->nama_kecamatan}}</li>
                        <li class="list-group-item"><b>Tipe Wisata : </b>{{$Wisata->tipe_wisata->nama_tipe_wisata}}</li>
                        <li class="list-group-item"><b>Keterangan : </b>{{$Wisata->keterangan}}</li>
                        <li class="list-group-item"><b>Gambar : </b>{{$Wisata->gambar}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('wisata.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection