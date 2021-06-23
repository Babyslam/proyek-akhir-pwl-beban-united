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

                    <form method="post" action="{{ route('kabupaten.update', $Kabupaten->id_kabupaten) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">Id Kabupaten</label>
                        <input type="text" name="id" class="form-control" id="id" value="{{ $Kabupaten->id_kabupaten }}" ariadescribedby="id" >
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control" id="id" value="{{ $Kabupaten->nama_kabupaten }}" ariadescribedby="name" >
                    </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
