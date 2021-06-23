<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\TipeWisata;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $wisatas = Wisata::where([
            ['nama_wisata','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_wisata','LIKE','%'.$term.'%')
                          ->orWhere('kabupaten_id','LIKE','%'.$term.'%')
                          ->orWhere('kecamatan_id','LIKE','%'.$term.'%')
                          ->orWhere('tipe_id','LIKE','%'.$term.'%')
                          ->orWhere('gambar','LIKE','%'.$term.'%')
                          ->orWhere('keterangan','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_wisata','asc')
        ->simplePaginate(5);
        
        return view('wisata.index' , compact('wisatas'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $tipe_wisatas = TipeWisata::all();
        return view('wisata.create', compact('kabupatens', 'kecamatans', 'tipe_wisatas'));
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
            'nama_wisata' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'tipe_id' => 'required',
            'keterangan' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg',
        ]);

        // Fungsi eloquent untuk menambah data
        // Pelanggan::create($request->all());
        if ($request->file('gambar')) 
        {
            $image_name = $request->file('gambar')->store('images', 'public');
            Wisata::create([
                'nama_wisata'               => $request->nama_wisata,
                'kabupaten_id'              => $request->kabupaten_id,
                'kecamatan_id'              => $request->kecamatan_id,
                'tipe_id'                   => $request->tipe_id,
                'keterangan'                => $request->keterangan,
                'gambar'                    => $image_name,
            ]);
        }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('wisata.index')
            ->with('success', 'Wisata Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_wisata)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $wisatas = Wisata::with('kabupaten')->where('id_wisata', $id_wisata)->first();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $tipe_wisatas = TipeWisata::all();
        return view('wisata.edit', ['Wisata' => $wisatas, 'Kabupaten' => $kabupatens, 'Kecamatan' => $kecamatans, 'TipeWisata' => $tipe_wisatas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_wisata)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $wisatas = Wisata::with('kabupaten')->where('id_wisata', $id_wisata)->first();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $tipe_wisatas = TipeWisata::all();
        return view('wisata.edit', ['Wisata' => $wisatas, 'Kabupaten' => $kabupatens, 'Kecamatan' => $kecamatans, 'TipeWisata' => $tipe_wisatas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_wisata)
    {
        // Melakukan validasi data
        $request->validate([
            'nama_wisata' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'tipe_id' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $wisatas = Wisata::find($id_wisata);
        
        $kabupatens = new Kabupaten;
        $kabupatens->id_kabupaten = $request->get('kabupaten_id');

        $kecamatans = new Kecamatan;
        $kecamatans->id_kecamatan = $request->get('kecamatan_id');

        $tipe_wisatas = new TipeWisata;
        $tipe_wisatas->id_tipe = $request->get('tipe_id');

        if($wisatas->gambar && file_exists(storage_path('app/public/' . $wisatas->gambar))){
            \Storage::delete('public/' . $wisatas->gambar);
        }

        $image_name = $request->file('gambar')->store('images', 'public');
        $wisatas->gambar = $image_name;
        $wisatas->save();

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('wisata.index')
            ->with('success', 'Wisata Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_wisata)
    {
        // Fungsi eloquent untuk menghapus data
        Wisata::find($id_wisata)->delete();
        return redirect()->route('wisata.index')
            -> with('success', 'Wisata Berhasil Dihapus');
    }
}
