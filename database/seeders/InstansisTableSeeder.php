<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstansisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('instansis')->delete();
        
        \DB::table('instansis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PNS/ASN',
                'created_at' => '2023-08-30 18:20:03',
                'updated_at' => '2023-08-31 17:18:58',
                'user_id' => NULL,
                'urutan' => 4,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Pengusaha/Wirausaha',
                'created_at' => '2023-08-31 17:20:08',
                'updated_at' => '2023-08-31 17:20:08',
                'user_id' => 1,
                'urutan' => 3,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Petugas Lapangan',
                'created_at' => '2023-08-31 17:20:13',
                'updated_at' => '2023-08-31 17:21:49',
                'user_id' => 1,
                'urutan' => 2,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Petani',
                'created_at' => '2023-08-31 17:20:22',
                'updated_at' => '2023-08-31 17:20:22',
                'user_id' => 1,
                'urutan' => 1,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Pelajar/Mahasiswa-i',
                'created_at' => '2023-08-31 17:20:26',
                'updated_at' => '2023-08-31 17:21:25',
                'user_id' => 1,
                'urutan' => 6,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Umum',
                'created_at' => '2023-08-31 17:20:31',
                'updated_at' => '2023-08-31 17:20:42',
                'user_id' => 1,
                'urutan' => 7,
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Guru/Dosen/Akademisi',
                'created_at' => NULL,
                'updated_at' => NULL,
                'user_id' => NULL,
                'urutan' => 5,
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Praktisi ',
                'created_at' => NULL,
                'updated_at' => NULL,
                'user_id' => NULL,
                'urutan' => NULL,
            ),
        ));
        
        
    }
}