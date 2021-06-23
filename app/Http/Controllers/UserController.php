<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Wisata;

class UserController extends Controller
{
    public function wisata(Request $request){
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
        
        return view('user.wisata' , compact('wisatas'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function hotel(Request $request){
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
        
        return view('user.hotel' , compact('hotel'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
}
