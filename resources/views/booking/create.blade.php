@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Booking</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data booking</strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Perhatian!</strong> Ada masalah dengan inputan Anda!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('booking.store') }}" id="myForm" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="wisata_id">Wisata</label>
                                <select name="wisata_id" id="wisata_id" class="form-control">
                                    <option selected disabled>Pilih Wisata</option>
                                @foreach($wisatas as $ws)
                                    <option value="{{ $ws->id_wisata }}">{{ $ws->nama_wisata }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hotel_id">Hotel</label>
                                <select name="hotel_id" id="hotel_id" class="form-control">
                                    <option selected disabled>Pilih Hotel</option>
                                @foreach($hotel as $ht)
                                    <option value="{{ $ht->id_hotel }}">{{ $ht->nama_hotel }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pelanggan_id">Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                    <option selected disabled>Pilih Pelanggan</option>
                                @foreach($pelanggan as $pl)
                                    <option value="{{ $pl->id_pelanggan }}">{{ $pl->nama }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" aria-describedby="harga" required="required">
                            </div>

                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="date" name="tgl" class="form-control" id="tgl" aria-describedby="tgl" placeholder="dd-mm-yyyy" 
                                value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('booking.index') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
