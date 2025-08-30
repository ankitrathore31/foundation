<?php

use App\Models\Activity;
use Carbon\Carbon;

if (!function_exists('totalActivities')) {
    function totalActivities()
    {
        return Activity::count();
    }
}

if (!function_exists('todayActivities')) {
    function todayActivities()
    {
        return Activity::whereDate('program_date', Carbon::today())->count();
    }
}