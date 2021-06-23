<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Pelanggan;
use App\Models\Wisata;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = ['wisata_id', 'hotel_id', 'pelanggan_id', 'harga', 'tgl'];

    public function wisata(){
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id_wisata');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id_hotel');
    }
    
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
    }
}
