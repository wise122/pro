<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArsipSertifikatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arsip_sertifikats')->delete();
        
        \DB::table('arsip_sertifikats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'no_hp' => '081214911911',
                'uid' => '7556c2bd-64e1-4a57-940b-b58905969c51',
                'judul' => 'Biosaka',
                'file' => 'DqneOMSKrf11xA2Dt3IruUoqaMUuDlPlyi0lHDLB.pdf',
                'created_at' => '2023-08-31 18:08:47',
                'updated_at' => '2023-08-31 18:08:47',
            ),
        ));
        
        
    }
}