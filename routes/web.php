<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/about', 'About')->name('about');
    Route::get('/service', 'Service')->name('service');
    Route::get('/project', 'Project')->name('project');
    Route::get('/activty', 'Activity')->name('activity');
    Route::get('/gallery','Gallery')->name('gallery');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/donation', 'Donation')->name('donation');
    Route::get('/notice-board', 'NoticeBoard')->name('notice-board');
});
