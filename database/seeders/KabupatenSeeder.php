<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = [
            [
                'nama_kabupaten'          => 'Lumajang',
            ],
            [
                'nama_kabupaten'          => 'Malang',
            ],
            [
                'nama_kabupaten'          => 'Kota Batu',
            ],
            [
                'nama_kabupaten'          => 'Jember',
            ],
        ];
        
        DB::table('kabupatens')->insert($kabupaten);
    }
}
