<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modules')->delete();
        
        \DB::table('modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Management Module',
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Management Permission',
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Management Role',
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Management User',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Management Setting',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Management Bts Propaktani',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Management Banner',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Management News',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Management Artikel',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Management Jadwal BTS',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Management Category',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Management Tag',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Management Video',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Management Buku',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Management Arsip Sertifikat',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Management Instansi',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Management Keahlian',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Management Jadwal Mingguan',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Management Faq',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Management Iot',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Management Biosaka',
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Management Bts Live',
                'created_at' => '2023-10-22 18:07:30',
                'updated_at' => '2023-10-22 18:07:30',
            ),
        ));
        
        
    }
}