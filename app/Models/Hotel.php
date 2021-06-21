<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table='hotel'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id_hotel';

    protected $fillable = ['nama_hotel', 'foto', 'alamat', 'telepon'];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
