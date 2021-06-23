@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Hotel
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Hotel : </b>{{$Hotel->id_hotel}}</li>
                        <li class="list-group-item"><b>Nama Hotel : </b>{{$Hotel->nama_hotel}}</li>
                        <li class="list-group-item"><b>Foto : </b>{{$Hotel->foto}}</li>
                        <li class="list-group-item"><b>Alamat : </b>{{$Hotel->alamat}}</li>
                        <li class="list-group-item"><b>Telepon : </b>{{$Hotel->telepon}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('hotel.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection