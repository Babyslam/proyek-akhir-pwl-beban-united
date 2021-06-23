<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $hotel = Hotel::where([
            ['nama_hotel','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_hotel','LIKE','%'.$term.'%')
                          ->orWhere('alamat','LIKE','%'.$term.'%')
                          ->orWhere('foto','LIKE','%'.$term.'%')
                          ->orWhere('telepon','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_hotel','asc')
        ->simplePaginate(5);
        
        return view('hotel.index' , compact('hotel'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
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
            'nama_hotel' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        // Pelanggan::create($request->all());
        if ($request->file('foto')) 
        {
            $image_name = $request->file('foto')->store('images', 'public');
            Hotel::create([
                'nama_hotel'                => $request->nama_hotel,
                'foto'                      => $image_name,
                'alamat'                    => $request->alamat,
                'telepon'                   => $request->telepon,
            ]);
        }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('hotel.index')
            ->with('success', 'Hotel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_hotel)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Hotel = Hotel::find($id_hotel);
        return view('hotel.detail', compact('Hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_hotel)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Hotel = Hotel::find($id_hotel);
        return view('hotel.edit', compact('Hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hotel)
    {
        // Melakukan validasi data
        $request->validate([
            'nama_hotel' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $hotel = Hotel::find($id_hotel);

        if($hotel->foto && file_exists(storage_path('app/public/' . $hotel->foto))){
            \Storage::delete('public/' . $hotel->foto);
        }

        $image_name = $request->file('foto')->store('images', 'public');
        $hotel->foto = $image_name;
        $hotel->save();

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('hotel.index')
            ->with('success', 'Hotel Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hotel)
    {
        // Fungsi eloquent untuk menghapus data
        Hotel::find($id_hotel)->delete();
        return redirect()->route('hotel.index')
            -> with('success', 'Hotel Berhasil Dihapus');
    }
}
