<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeahliansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('keahlians')->delete();
        
        \DB::table('keahlians')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lainnya',
                'urutan' => 1,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Perbenihan',
                'urutan' => 2,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Budi Daya',
                'urutan' => 3,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sosial Ekonomi',
                'urutan' => 4,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Mekanisasi Pertanian',
                'urutan' => 5,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ekonomi Pertanian',
                'urutan' => 6,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Pupuk',
                'urutan' => 7,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Opt/Hama',
                'urutan' => 8,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Dpi/Iklim',
                'urutan' => 9,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Ilmu Tanah',
                'urutan' => 10,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pengolahan',
                'urutan' => 11,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Sumber Daya Lahan',
                'urutan' => 12,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'SDM Petani',
                'urutan' => 13,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Agronomi',
                'urutan' => 14,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Agro Bisnis',
                'urutan' => 15,
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
        ));
        
        
    }
}