@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Kabupaten
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

                    <form method="post" action="{{ route('kecamatan.update', $Kecamatan->id_kecamatan) }}" id="myForm">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="kabupaten_id">Kabupaten</label>
                            <select name="kabupaten_id" id="kabupaten_id" class="form-control">
                                <option selected disabled>Pilih Kabupaten</option>
                                @foreach($Kabupaten as $kb)
                                    <option value="{{ $kb->id_kabupaten }}">{{ $Kecamatan->kabupaten_id == $kb->id_kabupaten ? 'selected': ''}}>{{ $kb->nama_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_kecamatan">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" id="nama_kecamatan" value="{{ $Kecamatan->nama_kecamatan }}" aria-describedby="nama_kecamatan" >
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
