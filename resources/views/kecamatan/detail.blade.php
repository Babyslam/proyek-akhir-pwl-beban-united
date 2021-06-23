@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Kecamatan
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Kecamatan : </b>{{$Kecamatan->id_kecamatan}}</li>
                        <li class="list-group-item"><b>kabupaten : </b>{{$Kecamatan->kabupaten->nama_kabupaten}}</li>
                        <li class="list-group-item"><b>Nama Kecamatan : </b>{{$Kecamatan->nama_kecamatan}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('kecamatan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection