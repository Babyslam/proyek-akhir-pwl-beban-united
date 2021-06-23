@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Wisata</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data wisata</strong></h3>
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
                        <form method="POST" action="{{ route('wisata.store') }}" id="myForm" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_wisata">Nama Wisata</label>
                                <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" aria-describedby="nama_wisata" required="required">
                            </div>

                            <div class="form-group">
                                <label for="kabupaten_id">Kabupaten</label>
                                <select name="kabupaten_id" id="kabupaten_id" class="form-control">
                                    <option selected disabled>Pilih Kabupaten</option>
                                @foreach($kabupatens as $kb)
                                    <option value="{{ $kb->id_kabupaten }}">{{ $kb->nama_kabupaten }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                    <option selected disabled>Pilih Kecamatan</option>
                                @foreach($kecamatans as $kc)
                                    <option value="{{ $kc->id_kecamatan }}">{{ $kc->nama_kecamatan }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tipe_id">Tipe Wisata</label>
                                <select name="tipe_id" id="tipe_id" class="form-control">
                                    <option selected disabled>Pilih Tipe Wisata</option>
                                @foreach($tipe_wisatas as $tw)
                                    <option value="{{ $tw->id_tipe }}">{{ $tw->nama_tipe_wisata }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" required="required">
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label> 
                                <input type="file" name="gambar" class="form-control" id="gambar" aria-describedby="gambar" required="required">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('wisata.index') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
