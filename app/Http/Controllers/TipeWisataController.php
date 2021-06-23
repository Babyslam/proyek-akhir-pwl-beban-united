<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeWisata;

class TipeWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $tipe_wisatas = TipeWisata::where([
            ['nama_tipe_wisata','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_tipe_wisata','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_tipe','asc')
        ->simplePaginate(5);
        
        return view('tipe_wisata.index' , compact('tipe_wisatas'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipe_wisata.create');
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
            'nama_tipe_wisata' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        TipeWisata::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tipe_wisata.index')
            ->with('success', 'Tipe Wisata Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_tipe)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $tipe_wisatas = TipeWisata::find($id_tipe);
        return view('tipe_wisata.detail', compact('tipe_wisatas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tipe)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $tipe_wisatas = TipeWisata::find($id_tipe);
        return view('tipe_wisata.edit', compact('tipe_wisatas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tipe)
    {
        // Melakukan validasi data
        $request->validate([
            'nama_tipe_wisata' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        TipeWisata::find($id_tipe)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('tipe_wisata.index')
            ->with('success', 'Tipe Wisata Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tipe)
    {
        // Fungsi eloquent untuk menghapus data
        TipeWisata::find($id_tipe)->delete();
        return redirect()->route('tipe_wisata.index')
            -> with('success', 'Tipe Wisata Berhasil Dihapus');
    }
}
