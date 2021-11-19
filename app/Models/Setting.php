<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasFactory;
    use HasPhoto;

    public static function timeFormats()
    {
        return [
            'g:i A',
            'h:i A',
            'H:i',
        ];
    }

    public static function dateFormats()
    {
        return [
            'Y-m-d',
            'D M d, Y',
            'M j, Y',
            'd M, Y',
            'm/d/Y',
            'n/d/y',
            'd/m/Y',
            'd.m.Y',
            'Y.m.d',
        ];
    }

    public static function timezones()
    {
        return timezone_identifiers_list();
    }

    /**
     * Get the app settings
     */
    public static function getSettings()
    {
        try {
            return Auth::user()->setting()->firstOrNew();
        } catch (\Throwable $throwable) {
            return null;
        }
    }
}
