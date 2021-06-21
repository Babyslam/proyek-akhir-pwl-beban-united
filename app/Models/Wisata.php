<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\TipeWisata;

class Wisata extends Model
{
    use HasFactory;
    protected $table='wisatas'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id_wisata';

    protected $fillable = ['nama_wisata', 'kabupaten_id', 'kecamatan_id', 'tipe_id', 'keterangan', 'gambar'];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id_kabupaten');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id_kecamatan');
    }
    
    public function tipe_wisata(){
        return $this->belongsTo(TipeWisata::class, 'tipe_id', 'id_tipe');
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
