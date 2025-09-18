<?php

use App\Models\Activity;
use App\Models\Beneficiarie;
use App\Models\Donation;
use App\Models\Member;
use Carbon\Carbon;
use App\Models\Ngo;
use App\Models\OnlineDonation;

if (!function_exists('ngo_info')) {
    function ngo_info($key = null)
    {
        $ngo = \App\Models\Ngo::first();

        if (!$ngo) {
            return null;
        }

        return $key ? $ngo->$key : $ngo;
    }
}


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

if (!function_exists('total_registered')) {
    function total_registered()
    {
        return Member::count() + Beneficiarie::count();
    }
}


if (!function_exists('total_pending')) {
    function total_pending()
    {
        return Member::where('status', 0)->count()
             + Beneficiarie::where('status', 0)->count();
    }
}

if (!function_exists('total_approved')) {
    function total_approved()
    {
        return Member::where('status', 1)->count()
             + Beneficiarie::where('status', 1)->count();
    }
}

if (!function_exists('total_deleted')) {
    function total_deleted()
    {
        return Member::onlyTrashed()->count()
             + Beneficiarie::onlyTrashed()->count();
    }
}

if(!function_exists('totalBene')){
    function totalBene(){
        $data = Beneficiarie::where('status', 1)->count();
        return $data;
    }
}
if(!function_exists('totalApproveBene')){
    function totalApproveBene(){
        return  Beneficiarie::where('survey_status', 1)->count();
         
    }
}
if (!function_exists('totalPendingBene')) {
    function totalPendingBene()
    {
        return Beneficiarie::where('status', 1)
            ->where('survey_status', 0)
            ->count();
    }
}
if (!function_exists('RejectBene')) {
    function RejectBene()
    {
        return Beneficiarie::onlyTrashed()->count();
    }
}

if(!function_exists('totalMember')){
    function totalMember(){
        $data = Member::count();
        return $data;
    }
}

if(!function_exists('totalActiveMember')){
    function totalActiveMember(){
        $data = Member::where('status',1)->count();
        return $data;
    }
}

if(!function_exists('totalPendingMember')){
    function totalPendingMember(){
        $data = Member::where('status',0)->count();
        return $data;
    }
}

if (!function_exists('donation_total')) {
    function donation_total()
    {
        return Donation::sum('amount') + OnlineDonation::sum('amount');
    }
}

if (!function_exists('donation_today')) {
    function donation_today()
    {
        return Donation::whereDate('created_at', today())->sum('amount')
             + OnlineDonation::whereDate('created_at', today())->sum('amount');
    }
}

if (!function_exists('Offlinedonation_total')) {
    function Offlinedonation_total()
    {
        return Donation::sum('amount');
    }
}

if (!function_exists('Onlinedonation_total')) {
    function Onlinedonation_total()
    {
        return OnlineDonation::sum('amount');
    }
}
