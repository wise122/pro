<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'IoT',
                'seotitle' => 'iot',
                'status' => 1,
                'created_at' => '2023-08-31 11:30:26',
                'updated_at' => '2023-08-31 11:30:26',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Biosaka',
                'seotitle' => 'biosaka',
                'status' => 1,
                'created_at' => '2023-08-31 11:39:45',
                'updated_at' => '2023-08-31 11:39:45',
            ),
        ));
        
        
    }
}