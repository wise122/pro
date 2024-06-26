<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Ini adalah Role Admin',
                'created_at' => '2023-09-09 12:48:40',
                'updated_at' => '2023-09-09 12:48:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'produsen',
                'display_name' => 'Produsen',
                'description' => 'Ini adalah Role Produsen',
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'konsumen',
                'display_name' => 'Konsumen/Oftaker',
                'description' => 'Ini adalah Role Konsumen',
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'investor',
                'display_name' => 'Investor',
                'description' => 'Ini adalah Role Narasumber',
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'lainnya',
                'display_name' => 'Lainnya',
                'description' => 'Ini adalah Role Umum',
                'created_at' => '2023-09-09 12:48:41',
                'updated_at' => '2023-09-09 12:48:41',
            ),
        ));
        
        
    }
}