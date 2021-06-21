<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeWisata extends Model
{
    use HasFactory;
    protected $table="tipe_wisatas"; 
    public $timestamps= false;
    protected $primaryKey = 'id_tipe'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'id_tipe',
    'nama_tipe_wisata'
    ];

    public function wisata(){
        return $this->hasMany(Wisata::class);
    }
}
