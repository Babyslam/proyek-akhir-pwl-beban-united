@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Booking</h1>
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
                    <form action="{{ route('booking.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('booking.index') }}" class="mr-4 mt-1">
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
                                <th scope="">Id Booking</th>
                                <th scope="">Wisata</th>
                                <th scope="">Hotel</th>
                                <th scope="">Pelanggan</th>
                                <th scope="">Harga</th>
                                <th scope="">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $Booking)
                            <tr>
                                <td>{{ $Booking->id }}</td>
                                <td>{{ $Booking->wisata->nama_wisata }}</td>
                                <td>{{ $Booking->hotel->nama_hotel }}</td>
                                <td>{{ $Booking->pelanggan->nama }}</td>
                                <td>{{ $Booking->harga}}</td>
                                <td>{{ $Booking->tgl }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('user_booking.show', $Booking->id ) }}">Show</a>
                                    <a class="btn btn-warning" href="{{ route('user_booking.cetak_pdf', $Booking->id ) }}">Cetak</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $bookings->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
