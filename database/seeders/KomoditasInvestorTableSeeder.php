<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomoditasInvestorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komoditas_investor')->delete();
        
        \DB::table('komoditas_investor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 22160,
                'jenis_komoditas' => 'TANAMAN PANGAN',
                'kategori_komoditas' => 'SEGAR',
                'nama_komoditas' => NULL,
                'alamat' => NULL,
                'produksi_kuantitas' => '1 Ton',
                'produksi_waktu' => '1 bulan',
                'deskripsi' => NULL,
                'photo' => NULL,
                'propinsi' => 'Gorontalo',
                'kota' => 'Kabupaten Boalemo',
                'status' => 1,
                'created_at' => '2023-12-05 11:33:11',
                'updated_at' => '2023-12-05 11:33:11',
            ),
        ));
        
        
    }
}