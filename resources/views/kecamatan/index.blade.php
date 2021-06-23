@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Kecamatan</h1>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-success" href="{{ route('kecamatan.create') }}">Input Kecamatan</a>
            </div>
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('kecamatan.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <span class="input-group-btn mr-4 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <a href="{{ route('kecamatan.index') }}" class=" mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Refresh</span>
                                    </button>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="default-table">
                    <table>
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">Id Kecamatan</th>
                                <th scope="">Kabupaten</th>
                                <th scope="">Nama Kecamatan</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatans as $K)
                            <tr>
                                <td>{{ $K->id_kecamatan }}</td>
                                <td>{{ $K->kabupaten->nama_kabupaten }}</td>
                                <td>{{ $K->nama_kecamatan }}</td>
                                <td>
                                    <form action="{{ route('kecamatan.destroy', $K->id_kecamatan ) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kecamatan?')">
                                    <a class="btn btn-info" href="{{ route('kecamatan.show', $K->id_kecamatan ) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('kecamatan.edit', $K->id_kecamatan ) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $kecamatans->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
