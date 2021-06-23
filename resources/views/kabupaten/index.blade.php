@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Kabupaten</h1>
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
                <a class="btn btn-success" href="{{ route('kabupaten.create') }}">Input Kabupaten</a>
            </div>
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('kabupaten.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <span class="input-group-btn mr-4 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <a href="{{ route('kabupaten.index') }}" class=" mt-1">
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
                                <th scope="">Id Kabupaten</th>
                                <th scope="">Nama Kabupaten</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kabupatens as $Kabupaten)
                            <tr>
                                <td>{{ $Kabupaten->id_kabupaten }}</td>
                                <td>{{ $Kabupaten->nama_kabupaten }}</td>
                                <td>
                                    <form action="{{ route('kabupaten.destroy', $Kabupaten->id_kabupaten ) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data barang?')">
                                    <a class="btn btninfo" href="{{ route('kabupaten.show',$Kabupaten->id_kabupaten) }}">Show</a>
                                    <a class="btn btnprimary" href="{{ route('kabupaten.edit',$Kabupaten->id_kabupaten) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $kabupatens->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
