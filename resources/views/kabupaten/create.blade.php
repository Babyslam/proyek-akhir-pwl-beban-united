@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Kabupaten</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data kabupaten</strong></h3>
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
                        <form method="POST" action="{{ route('kabupaten.store') }}" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="id">Id Kabupaten</label>
                                <input type="text" name="id" class="form-control" id="id" aria-describedby="id" >
                            </div>

                            <div class="form-group">
                                <label for="name">Nama Kabupaten</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name" >
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kabupaten.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
