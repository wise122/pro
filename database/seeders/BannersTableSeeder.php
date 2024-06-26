<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cover' => 'https://www.propaktani.com/storage/files/1/WhatsApp Video 2024-02-07 at 20.58.18.mp4',
                'link' => 'https://propaktani.com/jejaring-hulu-hilir/produsen',
                'title' => 'produsen',
                'description' => NULL,
                'status' => 1,
                'urutan' => 1,
                'created_at' => '2024-02-08 03:03:31',
                'updated_at' => '2024-02-08 08:56:58',
            ),
            1 => 
            array (
                'id' => 2,
                'cover' => 'https://www.propaktani.com/storage/files/1/Banner/Sawah Rev 1.mp4',
                'link' => NULL,
                'title' => 'Banner Sawah 1',
                'description' => NULL,
                'status' => 1,
                'urutan' => 4,
                'created_at' => '2023-09-09 16:31:50',
                'updated_at' => '2024-02-08 09:02:08',
            ),
            2 => 
            array (
                'id' => 3,
                'cover' => 'https://www.propaktani.com/storage/files/1/Banner/Sawah Rev 2.mp4',
                'link' => NULL,
                'title' => 'Sawah 2',
                'description' => NULL,
                'status' => 1,
                'urutan' => 2,
                'created_at' => '2023-09-09 16:32:21',
                'updated_at' => '2024-02-08 09:01:28',
            ),
            3 => 
            array (
                'id' => 4,
                'cover' => 'https://www.propaktani.com/storage/files/1/Banner/Rev 3.mp4',
                'link' => NULL,
                'title' => 'Pak Prapto',
                'description' => NULL,
                'status' => 1,
                'urutan' => 3,
                'created_at' => '2023-09-09 16:32:55',
                'updated_at' => '2024-02-08 09:02:12',
            ),
            4 => 
            array (
                'id' => 5,
                'cover' => 'https://www.propaktani.com/storage/files/1/VID-20240119-WA0085.mp4',
                'link' => NULL,
                'title' => 'Banner baru',
                'description' => NULL,
                'status' => 0,
                'urutan' => 6,
                'created_at' => '2024-01-18 21:07:06',
                'updated_at' => '2024-02-08 09:01:09',
            ),
        ));
        
        
    }
}