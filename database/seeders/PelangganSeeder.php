<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = [
            [
                'nama'              => 'Pramudya Wibowo',
                'foto'              => '/images/pram.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Kota Probolinggo',
                'tgl_lahir'         => '2001-01-24',
            ],
            [
                'nama'              => 'Abdur Rozak',
                'foto'              => '/images/rozak.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Kota Probolinggo',
                'tgl_lahir'         => '2001-05-19',
            ],
            [
                'nama'              => 'Dandi Agung Setiawan',
                'foto'              => '/images/dandi.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Lumajang',
                'tgl_lahir'         => '2000-02-29',
            ],
            [
                'nama'              => 'Auzan Ihtifazuddin',
                'foto'              => '/images/auzan.jpg',
                'jk'                => 'Laki-laki',
                'alamat'            => 'Jember',
                'tgl_lahir'         => '2001-09-24',
            ],
        ];
        
        DB::table('pelanggan')->insert($pelanggan);
    }
}
