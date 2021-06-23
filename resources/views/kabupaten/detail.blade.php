@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Kabupaten
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Kabupaten: </b>{{$Kabupaten->id_kabupaten}}</li>
                        <li class="list-group-item"><b>Nama Kabupaten: </b>{{$Kabupaten->nama_kabupaten}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('kabupaten.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection