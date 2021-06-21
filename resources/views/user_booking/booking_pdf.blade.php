<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <title>Data Transaksi</title>
</head>

<body>
    <div class="text-center card-header">
        <h3>SISTEM INFORMASI WISATA JATIM</h3>
        <h4>Struk Booking</h4>
    </div>

    <table class="table table-bordered">
        <tr>
            <th scope="">Id Booking</th>
            <th scope="">Wisata</th>
            <th scope="">Hotel</th>
            <th scope="">Pelanggan</th>
            <th scope="">Harga</th>
            <th scope="">Tanggal</th>
        </tr>
        @foreach($bookings as $Booking)
        <tr>
            <td>{{ $Booking->id }}</td>
            <td>{{ $Booking->wisata->nama_wisata }}</td>
            <td>{{ $Booking->hotel->nama_hotel }}</td>
            <td>{{ $Booking->pelanggan->nama }}</td>
            <td>{{ $Booking->harga}}</td>
            <td>{{ $Booking->tgl }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
