@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Pelanggan
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

                    <form method="post" action="{{ route('pelanggan.update', $Pelanggan->id_pelanggan) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $Pelanggan->nama }}" ariadescribedby="nama" >
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" value="{{ $Pelanggan->foto }}" ariadescribedby="foto" >
                            <img width="150px" src="{{asset('storage/'.$Pelanggan->foto)}}" alt="">
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control" id="jk" value="{{ $Pelanggan->jk }}" ariadescribedby="jk" >
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Pelanggan->alamat }}" ariadescribedby="alamat" >
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{ $Pelanggan->tgl_lahir }}" aria-describedby="tgl_lahir" placeholder="dd-mm-yyyy" 
                            value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
