<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utility = new Setting();
        $utility->name = 'title_text';
        $utility->value = 'Pro Paktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'footer_text';
        $utility->value = 'Pro Paktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'site_currency_symbol';
        $utility->value = 'Rp ';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_name';
        $utility->value = 'Pro Paktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_address';
        $utility->value = 'Jl. Example';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_phone';
        $utility->value = '0812-9626-9662';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_email';
        $utility->value = 'propaktani.ditjentp@gmail.com';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'postal_code';
        $utility->value = '';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_fb';
        $utility->value = 'propaktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_ig';
        $utility->value = 'propaktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_twitter';
        $utility->value = 'twitter.com';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_yt';
        $utility->value = 'propaktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_telegram';
        $utility->value = 'propaktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'company_tiktok';
        $utility->value = '@propaktani';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'phone_wa';
        $utility->value = '0812-9626-9662';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'text_wa';
        $utility->value = 'Hallo, Admin Propaktani, Saya Dapat Info dari Website';
        $utility->save();

        $utility = new Setting();
        $utility->name = 'text_maintenance';
        $utility->value = 'Hallo, Admin Propaktani, Saat Ini Sedang Maintenance';
        $utility->save();
    }
}
