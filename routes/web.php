<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SignatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/about', 'About')->name('about');
    Route::get('/service', 'Service')->name('service');
    Route::get('/project', 'Project')->name('project');
    Route::get('/activty', 'Activity')->name('activity');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/donation', 'Donation')->name('donation');
    Route::get('/notice-board', 'NoticeBoard')->name('notice-board');
});
Route::get('/gallery-page', [HomeController::class, 'gallery'])->name('gallery.page');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'registerPage')->name('register.show');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'LoginPage')->name('login.page');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('/admin', 'Admin')->name('admin');
});

Route::controller(NgoController::class)->middleware('auth')->group(function () {
    Route::get('/ngo', 'Ngo')->name('ngo');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('admin/profile', 'Profile')->middleware('auth')->name('profile');
    Route::get('admin/edit-profile', 'EditProfile')->middleware('auth')->name('profile.edit');
    Route::post('admin/update-profile', 'UpdateProfile')->middleware('auth')->name('profile.update');
    Route::get('admin/change-pass', 'ChangePassword')->Middleware('auth')->name('change.pass.show');
    Route::post('admin/update-pass', 'UpdatePass')->middleware('auth')->name('password.change');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('ngo/session', 'sessionlist')->middleware('auth')->name('session-list');
    Route::get('ngo/add-session', 'addsession')->middleware('auth')->name('add-session');
    Route::post('ngo/save-session', 'savesession')->middleware('auth')->name('save-session');
    Route::get('ngo/edit-session/{id}', 'editsession')->middleware('auth')->name('edit-session');
    Route::put('ngo/update-session/{id}', 'updatesession')->middleware('auth')->name('update-session');
    Route::get('ngo/delete-session/{id}', 'deletesession')->middleware('auth')->name('delete-session');
});

Route::controller(ActivityController::class)->group(function () {
    Route::get('ngo/activitylist', 'activitylist')->middleware('auth')->name('activitylist');
    Route::get('ngo/addactivity', 'addactivity')->middleware('auth')->name('addactivity');
    Route::post('ngo/saveactivity', 'saveactivity')->middleware('auth')->name('saveactivity');
    Route::get('ngo/editactivity/{id}', 'editactivity')->middleware('auth')->name('editactivity');
    Route::post('ngo/updateactivity/{id}', 'updateactivity')->middleware('auth')->name('updateactivity');
    Route::get('ngo/removeactivity/{id}', 'removeactivity')->middleware('auth')->name('removeactivity');
    Route::get('ngo/viewactivity/{id}', 'viewactivity')->middleware('auth')->name('viewactivity');
    Route::get('ngo/addevent', 'addevent')->middleware('auth')->name('add-event');
    Route::post('ngo/save-event', 'saveEvent')->middleware('auth')->name('save-event');
    Route::get('ngo/event-list', 'eventList')->middleware('auth')->name('event-list');
    Route::get('ngo/delete-event/{id}', 'removeEvent')->middleware('auth')->name('remove-event');
    Route::get('ngo/view-event/{id}', 'viewEvent')->middleware('auth')->name('view-event');
    Route::get('ngo/edit-event/{id}', 'editEvent')->middleware('auth')->name('edit-event');
    Route::post('ngo/update-event/{id}', 'updateEvent')->middleware('auth')->name('update-event');
    Route::get('ngo/category-list', 'CategoryList')->middleware('auth')->name('category.list');
    Route::get('ngo/add-category', 'AddCategory')->middleware('auth')->name('add.category');
    Route::post('ngo/store-category', 'StoreCategory')->middleware('auth')->name('store.category');
    Route::get('ngo/category-delete/{id}', 'DeleteCategory')->middleware('auth')->name('remove.category');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('ngo/add-project', 'AddProject')->middleware('auth')->name('add.project');
    Route::post('ngo/store-project', 'StoreProject')->middleware('auth')->name('store.project');
    Route::get('ngo/edit-project/{id}', 'EditProject')->middleware('auth')->name('edit.project');
    Route::post('ngo/update-project/{id}', 'UpdateProject')->middleware('auth')->name('update.project');
    Route::get('ngo/delete-project/{id}', 'DeleteProject')->middleware('auth')->name('delete.project');
    Route::get('ngo/view-project/{id}', 'ViewProject')->middleware('auth')->name('view.project');
    Route::get('ngo/project-list', 'ProjectList')->middleware('auth')->name('list.project');
    Route::get('ngo/add-project-report/{id}', 'AddProjectReport')->middleware('auth')->name('add.project.report');
    Route::post('ngo/store-project-report', 'StoreProjectReport')->middleware('auth')->name('store.project.report');
    Route::get('ngo/edit-project-report/{id}', 'EditProjectReport')->middleware('auth')->name('edit.project.report');
    Route::post('ngo/update-project-report/{id}', 'UpdateProjectReport')->middleware('auth')->name('update.project.report');
    Route::get('ngo/delete-project-report/{id}', 'DeleteProjectReport')->middleware('auth')->name('delete.project.report');
    Route::get('ngo/view-project-report/{id}', 'ViewProjectReport')->middleware('auth')->name('view.project.report');
    Route::get('ngo/project-list-report', 'ProjectReportList')->middleware('auth')->name('list.project.report');
});

Route::controller(SignatureController::class)->group(function () {
    Route::get('ngo/signature', 'addSignature')->middleware('auth')->name('signature');
    Route::post('ngo/save-signature', 'saveSignature')->middleware('auth')->name('save-signature');
});

Route::controller(GalleryController::class)->group(function () {
    Route::get('ngo/gallery', 'gallery')->middleware('auth')->name('gallery-list');
    Route::get('ngo/add-Photos', 'addPhotos')->middleware('auth')->name('add-photos');
    Route::post('ngo/save-Photo', 'storePhoto')->middleware('auth')->name('save-photo');
    Route::delete('ngo/delete-Photo/{id}',  'deletePhoto')->middleware('auth')->name('delete-photo');
});

Route::controller(NoticeController::class)->group(function () {
    Route::get('ngo/add-notice', 'addnotice')->middleware('auth')->name('add-notice');
    Route::post('ngo/store-notice', 'storeNotice')->middleware('auth')->name('store-notice');
    Route::get('ngo/notice-list', 'NoticeList')->middleware('auth')->name('notice-list');
    Route::get('ngo/view-notice/{id}', 'ViewNotice')->middleware('auth')->name('view-notice');
    Route::get('ngo/edit-notice/{id}', 'editNotice')->middleware('auth')->name('edit-notice');
    Route::post('ngo/update-notice/{id}', 'updateNotice')->middleware('auth')->name('update-notice');
    Route::get('ngo/delete-notice/{id}', 'deleteNotice')->middleware('auth')->name('delete-notice');
    Route::get('ngo/notice-status/{id}', 'NoticeStatus')->middleware('auth')->name('notice-status');
});
