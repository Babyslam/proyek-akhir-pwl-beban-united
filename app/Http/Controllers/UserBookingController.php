<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Pelanggan;
use App\Models\Wisata;
use PDF;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $bookings = Booking::where([
            ['harga','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('harga','LIKE','%'.$term.'%')
                          ->orWhere('wisata_id','LIKE','%'.$term.'%')
                          ->orWhere('hotel_id','LIKE','%'.$term.'%')
                          ->orWhere('pelanggan_id','LIKE','%'.$term.'%')
                          ->orWhere('tgl','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('user_booking.index' , compact('bookings'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::all();
        $pelanggan = Pelanggan::all();
        $wisatas = Wisata::all();
        return view('user_booking.create', compact('hotel', 'pelanggan', 'wisatas'));
        // return $tipe_wisatas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'wisata_id' => 'required',
            'hotel_id' => 'required',
            'pelanggan_id' => 'required',
            'harga' => 'required',
            'tgl' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $bookings = new Booking;
        $bookings->id = $request->get('id');
        $bookings->wisata_id = $request->get('wisata_id');
        $bookings->hotel_id = $request->get('hotel_id');
        $bookings->pelanggan_id = $request->get('pelanggan_id');
        $bookings->harga = $request->get('harga');
        $bookings->tgl = $request->get('tgl');
        $bookings->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user_booking.index')
            ->with('success', 'Booking Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $bookings = Booking::with('wisata')->where('id', $id)->first();
        $hotel = Hotel::all();
        $pelanggan = Pelanggan::all();
        $wisatas = Wisata::all();
        return view('user_booking.detail', ['Booking' => $bookings, 'Hotel' => $hotel, 'Pelanggan' => $pelanggan, 'Wisata' => $wisatas ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $bookings = Booking::with('wisata')->where('id', $id)->first();
        // $hotel = Hotel::all();
        // $pelanggan = Pelanggan::all();
        // $wisatas = Wisata::all();
        // return view('booking.edit', ['Booking' => $bookings, 'Hotel' => $hotel, 'Pelanggan' => $pelanggan, 'Wisata' => $wisatas ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi data
        // $request->validate([
        //     'wisata_id' => 'required',
        //     'hotel_id' => 'required',
        //     'pelanggan_id' => 'required',
        //     'harga' => 'required',
        //     'tgl' => 'required',
        // ]);

        // // Fungsi eloquent untuk mengupdate data inputan kita
        // $bookings = Boking::find($id)->update($request->all());

        // $hotels = new Hotel;
        // $hotels->id_hotel = $request->get('hotel_id');

        // $pelanggan = new Pelanggan;
        // $pelanggan->id_pelanggan = $request->get('pelanggan_id');

        // $wisatas = new TipeWisata;
        // $wisatas->id_wisata = $request->get('wisata_id');

        // // Jika data berhasil diupdate, akan kembali ke halaman utama
        // return redirect()->route('booking.index')
        //     ->with('success', 'Boking Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        // Boking::find($id)->delete();
        // return redirect()->route('booking.index')
        //     -> with('success', 'Booking Berhasil Dihapus');
    }

    public function cetak_pdf($id){
        $bookings = Booking::with('wisata')
            ->where('id', $id)
            ->get();
        $pdf = PDF::loadview('user_booking.booking_pdf', compact('bookings'));
        return $pdf->stream();
    }
}
