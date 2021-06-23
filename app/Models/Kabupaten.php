<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table='kabupatens'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id_kabupaten';

    protected $fillable = [
        'id_kabupaten',
        'nama_kabupaten',
        ];

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }

    public function wisata(){
        return $this->hasMany(Wisata::class);
    }
}
