@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Kecamatan</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data kecamatan</strong></h3>
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
                        <form method="POST" action="{{ route('kecamatan.store') }}" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="kabupaten_id">Kabupaten</label>
                                <select name="kabupaten_id" id="kabupaten_id" class="form-control">
                                    <option selected disabled>Pilih Kabupaten</option>
                                @foreach($Kabupaten as $kb)
                                    <option value="{{ $kb->id_kabupaten }}">{{ $kb->nama_kabupaten }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="nama_kecamatan" aria-describedby="nama_kecamatan" >
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kecamatan.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
