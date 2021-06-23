@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Hotel
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

                    <form method="post" action="{{ route('hotel.update', $Hotel->id_hotel) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_hotel">Nama Hotel</label>
                        <input type="text" name="nama_hotel" class="form-control" id="nama_hotel" value="{{ $Hotel->nama_hotel }}" ariadescribedby="nama_hotel" >
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" value="{{ $Hotel->foto }}" ariadescribedby="foto" >
                        <img width="150px" src="{{asset('storage/'.$Hotel->foto)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Hotel->alamat }}" ariadescribedby="alamat" >
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" class="form-control" id="telepon" value="{{ $Hotel->no_telepon }}" ariadescribedby="telepon" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('hotel.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
