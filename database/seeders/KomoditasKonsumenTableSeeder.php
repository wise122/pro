<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomoditasKonsumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komoditas_konsumen')->delete();
        
        \DB::table('komoditas_konsumen')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 23220,
                'jenis_komoditas' => 'HORTIKULTURA',
                'kategori_komoditas' => 'SEGAR',
                'nama_komoditas' => 'Kentang',
                'alamat' => 'Kabupaten Samosir',
                'produksi_kuantitas' => '3 Ton',
                'produksi_waktu' => '15 hari',
                'deskripsi' => 'Produksi kentang di daerah Tele',
                'photo' => 'kWe1I1Ax54FeCOxSRAjoqyKf7WXwRJf2gELDn7jN.jpg',
                'propinsi' => 'Sumatera Utara',
                'kota' => 'Kabupaten Asahan',
                'status' => 1,
                'created_at' => '2023-12-13 10:29:27',
                'updated_at' => '2023-12-13 10:29:27',
            ),
        ));
        
        
    }
}