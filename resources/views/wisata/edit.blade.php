@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Wisata
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

                    <form method="post" action="{{ route('wisata.update', $Wisata->id_wisata) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" value="{{ $Wisata->nama_wisata }}" aria-describedby="nama_wisata" required="required">
                    </div>

                    <div class="form-group">
                        <label for="kabupaten_id">Kabupaten</label>
                        <select name="kabupaten_id" id="kabupaten_id" class="form-control">
                            <option selected disabled>Pilih Kabupaten</option>
                            @foreach($Kabupaten as $kb)
                                <option value="{{ $kb->id_kabupaten }}">{{ $Wisata->kabupaten_id == $kb->id_kabupaten ? 'selected': ''}}>{{ $kb->nama_kabupaten }}</option>
                             @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan_id">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                            <option selected disabled>Pilih Kecamatan</option>
                            @foreach($Kecamatan as $kc)
                                <option value="{{ $kc->id_kecamatan }}">{{ $Wisata->kecamatan_id == $kc->id_kecamatan ? 'selected': ''}}>{{ $kc->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipe_id">Tipe Wisata</label>
                        <select name="tipe_id" id="tipe_id" class="form-control">
                            <option selected disabled>Pilih Tipe Wisata</option>
                            @foreach($TipeWisata as $tw)
                                <option value="{{ $tw->id_tipe }}">{{ $Wisata->tipe_id == $tw->id_tipe ? 'selected': ''}}>{{ $tw->nama_tipe_wisata }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $Wisata->keterangan }}" aria-describedby="keterangan" required="required">
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label> 
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $Wisata->gambar }}" aria-describedby="gambar" required="required">
                        <img width="150px" src="{{asset('storage/'.$Wisata->gambar)}}" alt="">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('wisata.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
