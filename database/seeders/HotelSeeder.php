<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel = [
            [
                'nama_hotel'              => 'Meotel jember',
                'foto'              => '/images/meotel-jember.jpg',
                'alamat'            => 'Jember',
                'telepon'           => '0334-123-456',
            ],
            [
                'nama_hotel'              => 'Swiss-Beliin Malang',
                'foto'              => '/images/swiss-belinn.jpg',
                'alamat'            => 'Kota Malang',
                'telepon'           => '0334-134-980',
            ],
            [
                'nama_hotel'              => 'Ibis Styles Malang',
                'foto'              => '/images/ibis-styles.jpg',
                'alamat'            => 'Malang',
                'telepon'           => '0334-234-765',
            ],
            [
                'nama_hotel'              => 'JW Marriott Surabaya',
                'foto'              => '/images/jw-marriot.jpg',
                'alamat'            => 'Surabaya',
                'telepon'           => '0334-976-512',
            ],
            [
                'nama_hotel'              => 'Ascott Waterplace Surabaya',
                'foto'              => '/images/ascott.jpg',
                'alamat'            => 'Surabaya',
                'telepon'           => '0334-976-002',
            ],
        ];
        
        DB::table('hotel')->insert($hotel);
    }
}
