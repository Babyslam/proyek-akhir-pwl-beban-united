@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Hotel</h1>
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
                    <form action="{{ route('hotel.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('hotel.index') }}" class="mr-4 mt-1">
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
                                <th scope="">Id Hotel</th>
                                <th scope="">Nama Hotel</th>
                                <th scope="">Foto</th>
                                <th scope="">Alamat</th>
                                <th scope="">Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotel as $Htl)
                            <tr>
                                <td>{{ $Htl->id_hotel }}</td>
                                <td>{{ $Htl->nama_hotel }}</td>
                                <td><img width="200px" src="{{asset('storage/'.$Htl->foto)}}" alt=""></td>
                                <td>{{ $Htl->alamat }}</td>
                                <td>{{ $Htl->telepon }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $hotel->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
