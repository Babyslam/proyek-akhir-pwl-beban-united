@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Booking
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('booking.update', $Booking->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="wisata_id">Wisata</label>
                        <select name="wisata_id" id="wisata_id" class="form-control">
                            <option selected disabled>Pilih Wisata</option>
                        @foreach($Wisata as $ws)
                            <option value="{{ $ws->id_wisata }}">{{ $Booking->wisata_id == $ws->id_wisata ? 'selected': ''}}>{{ $ws->nama_wisata }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hotel_id">Hotel</label>
                        <select name="hotel_id" id="hotel_id" class="form-control">
                            <option selected disabled>Pilih Hotel</option>
                        @foreach($Hotel as $ht)
                            <option value="{{ $ht->id_hotel }}">{{ $Booking->hotel_id == $ht->id_hotel ? 'selected': ''}}>{{ $ht->nama_hotel }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pelanggan_id">Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                            <option selected disabled>Pilih Pelanggan</option>
                        @foreach($Pelanggan as $pl)
                            <option value="{{ $pl->id_pelanggan }}">{{ $Booking->pelanggan_id == $pl->id_pelanggan ? 'selected': ''}}>{{ $pl->nama }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="{{ $Booking->harga }}" aria-describedby="harga" required="required">
                    </div>

                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" name="tgl" class="form-control" id="tgl" value="{{ $Booking->tgl }}" aria-describedby="lahir" placeholder="dd-mm-yyyy" 
                        value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('booking.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
