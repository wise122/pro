<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    public static function settings()
    {
        $data = DB::table('settings')->get();

        $settings = [
            "title_text" => "Pro Paktani",
            "footer_text" => "Pro Paktani",
            "site_currency_symbol" => "Rp ",
            "company_name" => "Pro Paktani",
            "company_address" => "Jl. Example",
            "company_phone" => "0812-9626-9662",
            "company_email" => "propaktani.ditjentp@gmail.com",
            "postal_code" => "",
            "company_fb" => "propaktani",
            "company_ig" => "propaktani",
            "company_twitter" => "",
            "company_yt" => "propaktani",
            "company_telegram" => "propaktani",
            "company_tiktok" => "@propaktani",
            "phone_wa" => "0812-9626-9662",
            "text_wa" => ""
        ];

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function getValByName($key)
    {
        $setting = Setting::settings();
        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }
        return $setting[$key];
    }

    public static function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str     = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition       = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine           = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}='{$envValue}'\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}
