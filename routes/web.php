<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\ProfileController;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('/register','registerPage')->name('register.show');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'LoginPage')->name('login.page');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->middleware('auth')->group(function(){
    Route::get('/admin','Admin')->name('admin');
});

Route::controller(NgoController::class)->middleware('auth')->group(function(){
    Route::get('/ngo','Ngo')->name('ngo');
});

Route::controller(ProfileController::class)->group(function(){
    Route::get('admin/profile', 'Profile')->middleware('auth')->name('profile');
    Route::get('admin/edit-profile', 'EditProfile')->middleware('auth')->name('profile.edit');
    Route::post('admin/update-profile', 'UpdateProfile')->middleware('auth')->name('profile.update');
    Route::get('admin/change-pass', 'ChangePassword')->Middleware('auth')->name('change.pass.show');
    Route::post('admin/update-pass', 'UpdatePass')->middleware('auth')->name('password.change');
});