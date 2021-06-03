<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table="kecamatans"; 
    public $timestamps= false;
    protected $primaryKey = 'id_kecamatan'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'id_kecamatan',
    'id_kabupaten',
    'nama_kecamatan',
    ];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
