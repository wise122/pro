<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pertanian',
                'slug' => 'pertanian',
                'status' => 1,
                'created_at' => '2023-08-31 11:30:48',
                'updated_at' => '2023-08-31 11:30:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'propaktani',
                'slug' => 'propaktani',
                'status' => 1,
                'created_at' => '2023-08-31 11:31:07',
                'updated_at' => '2023-08-31 11:31:07',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IoT',
                'slug' => 'iot',
                'status' => 1,
                'created_at' => '2023-08-31 11:31:37',
                'updated_at' => '2023-08-31 11:31:37',
            ),
        ));
        
        
    }
}