<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'title_text',
                'value' => 'Pro Paktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'footer_text',
                'value' => 'Pro Paktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'site_currency_symbol',
                'value' => 'Rp ',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'company_name',
                'value' => 'Pro Paktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'company_address',
                'value' => 'Jl. Example',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'company_phone',
                'value' => '0812-8782-7272',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'company_email',
                'value' => 'official@propaktani.com',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'postal_code',
                'value' => '',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'company_fb',
                'value' => 'propaktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'company_ig',
                'value' => 'propaktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'company_twitter',
                'value' => 'twitter.com',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'company_yt',
                'value' => 'propaktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'company_telegram',
                'value' => 'propaktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'company_tiktok',
                'value' => '@propaktani',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'phone_wa',
                'value' => '0812-8782-7272',
                'created_at' => '2023-09-10 09:12:52',
                'updated_at' => '2023-09-10 09:12:52',
            ),
        ));
        
        
    }
}