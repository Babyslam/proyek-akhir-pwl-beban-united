@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Booking
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Booking : </b>{{$Booking->id}}</li>
                        <li class="list-group-item"><b>Wisata : </b>{{$Booking->wisata->nama_wisata}}</li>
                        <li class="list-group-item"><b>Hotel : </b>{{$Booking->hotel->nama_hotel}}</li>
                        <li class="list-group-item"><b>Pelanggan : </b>{{$Booking->pelanggan->nama}}</li>
                        <li class="list-group-item"><b>Harga : </b>{{$Booking->harga}}</li>
                        <li class="list-group-item"><b>Tanggal : </b>{{$Booking->tgl}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('booking.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection