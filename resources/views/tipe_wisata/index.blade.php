@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Tipe Wisata</h1>
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
                <a class="btn btn-success" href="{{ route('tipe_wisata.create') }}">Input Tipe Wisata</a>
            </div>
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('tipe_wisata.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <span class="input-group-btn mr-4 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <a href="{{ route('tipe_wisata.index') }}" class=" mt-1">
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
                                <th scope="">Id Tipe</th>
                                <th scope="">Nama Tipe Wisata</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipe_wisatas as $tw)
                            <tr>
                                <td>{{ $tw->id_tipe }}</td>
                                <td>{{ $tw->nama_tipe_wisata }}</td>
                                <td>
                                    <form action="{{ route('tipe_wisata.destroy', $tw->id_tipe ) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kabupaten?')">
                                    <a class="btn btn-info" href="{{ route('tipe_wisata.show', $tw->id_tipe ) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('tipe_wisata.edit', $tw->id_tipe) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $tipe_wisatas->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
