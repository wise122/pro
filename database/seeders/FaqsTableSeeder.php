<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faqs')->delete();
        
        \DB::table('faqs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'title' => 'Cara Download Sertifikat?',
                'description' => '<p>Berikut adalah Link cara download Sertifikat&nbsp;</p><p><a href="https://youtu.be/ieUuyMtnyOI?si=kueMa90l74GT-cN9" target="_blank">LINK</a></p>',
                'status' => 1,
                'created_at' => '2023-09-19 13:49:25',
                'updated_at' => '2023-09-19 16:27:20',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'title' => 'Cara Membuat Akun?',
                'description' => '<p>Berikut adalah LINK Cara membuat Akun</p><p><a href="https://youtu.be/fxmrh8YXA_Y?si=FFe68TNfW1bhtfae" target="_blank">LINK</a></p>',
                'status' => 1,
                'created_at' => '2023-09-19 16:28:16',
                'updated_at' => '2023-09-19 16:32:13',
            ),
        ));
        
        
    }
}