<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;

trait FunctionGlobal
{
    function set_active_navbar($uri, $output = 'mm-active')
    {
        if (!function_exists('set_active_navbar')) {
            if (is_array($uri)) {
                foreach ($uri as $u) {
                    if (Route::is($u)) {
                        return $output;
                    }
                }
            } else {
                if (Route::is($uri)) {
                    return $output;
                }
            }
        }
    }
}
