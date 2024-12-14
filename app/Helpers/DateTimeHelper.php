<?php

namespace App\Helpers;

use Carbon\Carbon;
// use Illuminate\Support\Carbon;

class DateTimeHelper
{
    public static function getHourNow(): string
    {
        return Carbon::now('Europe/Rome')->format('H:i');
    }

    public static function getCurrentDate(): string
    {
        return Carbon::now('Europe/Rome')->format('d/m/Y H:i');
    }
}