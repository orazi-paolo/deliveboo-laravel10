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
}
