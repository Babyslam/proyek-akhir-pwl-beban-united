@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Wisata</h1>
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
            <div class="right">
                <div class="float-left">
                    <form action="{{ route('wisata.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('wisata.index') }}" class="mr-4 mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Refresh</span>
                                    </button>
                                </span>
                            </a>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <span class="input-group-btn mr-2 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
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
                                <th scope="">Id Wisata</th>
                                <th scope="">Nama  Wisata</th>
                                <th scope="">Kabupaten</th>
                                <th scope="">Kecamatan</th>
                                <th scope="">Tipe Wisata</th>
                                <th scope="">Keterangan</th>
                                <th scope="">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wisatas as $Wisata)
                            <tr>
                                <td>{{ $Wisata->id_wisata }}</td>
                                <td>{{ $Wisata->nama_wisata }}</td>
                                <td>{{ $Wisata->kabupaten->nama_kabupaten }}</td>
                                <td>{{ $Wisata->kecamatan->nama_kecamatan }}</td>
                                <td>{{ $Wisata->tipe_wisata->nama_tipe_wisata }}</td>
                                <td>{{ $Wisata->keterangan }}</td>
                                <td><img width="200px" src="{{asset('storage/'.$Wisata->gambar)}}" alt=""></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $wisatas->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
