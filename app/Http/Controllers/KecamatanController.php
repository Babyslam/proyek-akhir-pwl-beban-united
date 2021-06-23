<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $kecamatans = Kecamatan::where([
            ['nama_kecamatan','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_kecamatan','LIKE','%'.$term.'%')
                          ->orWhere('kabupaten_id','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_kecamatan','asc')
        ->simplePaginate(5);
        
        return view('kecamatan.index' , compact('kecamatans'))
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
        return view('kecamatan.create', ['Kabupaten' => $kabupatens]);
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
            'kabupaten_id' => 'required',
            'nama_kecamatan' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Kecamatan::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kecamatan.index')
            ->with('success', 'Kecamatan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kecamatan)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Kecamatan = Kecamatan::with('kabupaten')->where('id_kecamatan', $id_kecamatan)->first();
        return view('kecamatan.detail', compact('Kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kecamatan)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Kecamatan = Kecamatan::find($id_kecamatan);
        $kabupatens = Kabupaten::all();
        return view('kecamatan.edit', ['Kecamatan' => $Kecamatan, 'Kabupaten' => $kabupatens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kecamatan)
    {
        // Melakukan validasi data
        $request->validate([
            'kabupaten_id' => 'required',
            'nama_kecamatan' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        Kecamatan::find($id_kecamatan)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kecamatan.index')
            ->with('success', 'Kecamatan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kecamatan)
    {
        // Fungsi eloquent untuk menghapus data
        Kecamatan::find($id_kecamatan)->delete();
        return redirect()->route('kecamatan.index')
            -> with('success', 'Kecamatan Berhasil Dihapus');
    }
}
