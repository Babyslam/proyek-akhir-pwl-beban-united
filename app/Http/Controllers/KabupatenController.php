<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $kabupatens = Kabupaten::where([
            ['nama_kabupaten','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_kabupaten','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_kabupaten','asc')
        ->simplePaginate(5);
        
        return view('kabupaten.index' , compact('kabupatens'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten.create');
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
            'id_kabupaten' => 'required',
            'nama_kabupaten' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Kabupaten::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kabuapten.index')
            ->with('success', 'Kabupaten Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Kabupaten = Kabupaten::find($id_kabupaten);
        return view('kabupaten.detail', compact('Kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Kabupaten = Kabupaten::find($id_kabupaten);
        return view('kabupaten.edit', compact('Kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten)
    {
        // Melakukan validasi data
        $request->validate([
            'id_kabupaten' => 'required',
            'nama_kabupaten' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        Kabupaten::find($id_kabupaten)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kabupaten.index')
            ->with('success', 'Kabupaten Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten)
    {
        // Fungsi eloquent untuk menghapus data
        Kabupaten::find($id_kabupaten)->delete();
        return redirect()->route('kabupaten.index')
            -> with('success', 'Kabupaten Berhasil Dihapus');
    }
}
