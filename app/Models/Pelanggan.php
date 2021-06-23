<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table='pelanggan'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = ['nama', 'foto', 'jk', 'alamat', 'tgl_lahir'];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
