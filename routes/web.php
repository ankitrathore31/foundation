<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeneficiareController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SallaryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WorkingAreaController;
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
    Route::get('/donation', 'Donation')->name('donation.page');
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
    Route::get('ngo/profile', 'Profile')->middleware('auth')->name('profile');
    Route::post('ngo/store-profile', 'StoreProfile')->middleware('auth')->name('profile.store');
    Route::get('ngo/edit-profile', 'EditProfile')->middleware('auth')->name('edit.profile');
    Route::post('ngo/update-profile', 'UpdateProfile')->middleware('auth')->name('profile.update');
    Route::get('ngo/change-pass', 'ChangePassword')->Middleware('auth')->name('change.pass.show');
    Route::post('ngo/update-pass', 'UpdatePass')->middleware('auth')->name('password.change');
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

Route::controller(DonationController::class)->group(function () {
    Route::get('ngo/online-donor-list', 'onlineDonor')->middleware('auth')->name('online-donor-list');
    Route::get('ngo/donation-list', 'donationList')->middleware('auth')->name('donation-list');
    Route::get('ngo/donation', 'donation')->middleware('auth')->name('donation');
    Route::post('ngo/save-donation', 'saveDonation')->middleware('auth')->name('save-donation');
    Route::get('ngo/edit-donation/{id}', 'EditDonation')->middleware('auth')->name('edit-donation');
    Route::post('ngo/update-donation/{id}', 'updateDonation')->middleware('auth')->name('update-donation');
    Route::get('ngo/delete-donation/{id}', 'deleteDonation')->middleware('auth')->name('delete-donation');
    Route::get('ngo/view-donation/{id}', 'viewDonation')->middleware('auth')->name('view-donation');
    Route::get('ngo/donation-card/{id}', 'viewDonationCard')->middleware('auth')->name('view-donation-card');
    Route::get('ngo/donation-certificate/{id}', 'viewDonationCertificate')->middleware('auth')->name('certi-donation');
    Route::get('ngo/donation-card-list', 'donationCardList')->middleware('auth')->name('donation-card-list');
    Route::get('ngo/all-donor-list', 'allDonations')->middleware('auth')->name('all-donor-list');
    Route::get('ngo/dontaion-report', 'DonationReport')->middleware('auth')->name('dontaion-report');
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

Route::middleware('auth')->group(function () {
    Route::get('ngo/registration', [RegistrationController::class, 'registration'])->name('registration');
    Route::post('ngo/store-registration', [RegistrationController::class, 'StoreRegistration'])->name('store-registration');
    Route::post('ngo/update-registration/{id}', [RegistrationController::class, 'UpdateRegistration'])->name('update-registration');
    Route::get('ngo/pending-registration', [RegistrationController::class, 'pendingRegistration'])->name('pending-registration');
    Route::patch('ngo/approve-status/{type}/{id}', [RegistrationController::class, 'approveStatus'])->name('approve-status');
    Route::get('ngo/approve-registration', [RegistrationController::class, 'approveRegistration'])->name('approve-registration');
    Route::get('ngo/show-apporve-registration/{id}/{type}', [RegistrationController::class, 'showApporveReg'])->name('show-apporve-reg');
    Route::patch('ngo/pending-status/{type}/{id}', [RegistrationController::class, 'pendingStatus'])->name('pending-status');
    Route::get('ngo/view-registration/{id}/{type}', [RegistrationController::class, 'viewRegistration'])->name('view-reg');
    Route::get('ngo/delete-view/{id}/{type}', [RegistrationController::class, 'deleteRegistrationPage'])->name('delete-view');
    Route::post('ngo/delete-registration/{id}/{type}', [RegistrationController::class, 'deleteRegistration'])->name('delete-reg');
    Route::get('ngo/recover-registration', [RegistrationController::class, 'recover'])->name('recover');
    Route::get('ngo/recover/{id}/{type}', [RegistrationController::class, 'recoverItem'])->name('recover-item');
    Route::get('ngo/online-registration-setting', [RegistrationController::class, 'onlineregistrationSetting'])->name('reg-setting');
    Route::post('ngo/registration-toggle', [RegistrationController::class, 'toggleSetting'])->name('registration.toggle');
    Route::get('ngo/edit-registration/{id}/{type}', [RegistrationController::class, 'editRegistration'])->name('edit-reg');
    Route::get('ngo/edit-apporve-registration/{id}/{type}', [RegistrationController::class, 'editApproveRegistration'])->name('edit-apporve-reg');
    Route::post('ngo/update-apporve-registration/{id}', [RegistrationController::class, 'UpdateApporveRegistration'])->name('update-apporve-registration');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('ngo/member-list', 'memberList')->middleware('auth')->name('member-list');
    Route::get('ngo/add-member-list', 'addmemberlist')->middleware('auth')->name('add-member-list');
    Route::get('ngo/view-member/{id}', 'showMember')->middleware('auth')->name('view-member');
    Route::post('ngo/save-position',  'savePosition')->middleware('auth')->name('save-member-position');
    Route::get('ngo/member-position-list', 'memberPostionlist')->middleware('auth')->name('member-position-list');
    Route::get('ngo/show-member/{id}', 'showMemberPosition')->middleware('auth')->name('show-member');
    Route::get('ngo/member-certificate/{id}', 'MemberCerti')->middleware('auth')->name('member-certi');
    Route::get('ngo/member-letter/{id}', 'MemberLetter')->middleware('auth')->name('member-letter');
    Route::get('ngo/member-activity-list', 'Memberactivitylist')->middleware('auth')->name('member-activitylist');
    Route::get('ngo/add-member-activity', 'addmemberactivity')->middleware('auth')->name('add-memberactivity');
    Route::post('ngo/save-member-activity',  'saveMemberactivity')->middleware('auth')->name('save-memberactivity');
    Route::get('ngo/activity-certificate/{id}/{category}', 'MemberActivityCerti')->middleware('auth')->name('member-activity-certi');
});

Route::controller(BeneficiareController::class)->group(function () {
    Route::get('ngo/add-beneficiarie-list', 'AddbeneficiarieList')->middleware('auth')->name('beneficiarie-add-list');
    Route::get('ngo/view-beneficiarie/{id}', 'viewbeneficiarie')->middleware('auth')->name('view-beneficiarie');
    Route::get('ngo/add-beneficiarie/{id}', 'addSurvey')->middleware('auth')->name('add-beneficiarie');
    Route::post('ngo/store-beneficiarie/{id}', 'storeSurvey')->middleware('auth')->name('store-beneficiarie');
    Route::get('ngo/beneficiarie-facilities', 'SurveyList')->middleware('auth')->name('beneficiarie-facilities');
    Route::get('ngo/add-beneficiarie-facilities/{beneficiarie_id}/survey/{survey_id}', 'addbeneficiarieFacilities')->middleware('auth')->name('add-beneficiarie-facilities');
    Route::post('ngo/store-beneficiarie-facilities/{beneficiarie_id}/survey/{survey_id}', 'storebeneficiariefacilities')->middleware('auth')->name('store-beneficiarie-facilities');
    Route::get('ngo/beneficiarie-Facilities-list', 'beneficiarieFacilitiesList')->middleware('auth')->name('beneficiarie-facilities-list');
    Route::get('ngo/edit-beneficiarie/{id}', 'editbeneficiarie')->middleware('auth')->name('edit-beneficiarie');
    Route::post('ngo/update-beneficiare/{id}', 'updatebeneficiarie')->middleware('auth')->name('update-beneficiarie');
    Route::get('ngo/show-beneficiarie-survey/{beneficiarie_id}/survey/{survey_id}', 'showbeneficiariesurvey')->middleware('auth')->name('show-beneficiarie-survey');
    Route::get('ngo/delete-survey/{beneficiarie_id}/survey/{survey_id}', 'deletesurvey')->middleware('auth')->name('delete-survey');
    Route::get('ngo/show-beneficiarie-facilities/{beneficiarie_id}/survey/{survey_id}/facilities/{facilities_id}', 'showbeneficiariefacilities')->middleware('auth')->name('show-beneficiarie-facilities');
    Route::get('ngo/edit-facilities/{beneficiarie_id}/facilities/{facilities_id}', 'editFacilities')->middleware('auth')->name('edit-facilities');
    Route::post('ngo/update-facilities/{beneficiarie_id}/facility/{facility_id}', 'updateFacilities')->middleware('auth')->name('update-facilities');
    Route::get('ngo/distribute-beneficiarie-facilities/{beneficiarie_id}/facility/{facility_id}', 'distributebeneficiarieFacilities')->middleware('auth')->name('distribute-beneficiarie-facilities');
    Route::post('ngo/store-distribute-facilities/{beneficiarie_id}/facility/{facility_id}', 'storedistributefacilities')->middleware('auth')->name('store-distribute-facilities');
    Route::get('ngo/edit-distribute-facilities/{beneficiarie_id}/facility/{facility_id}', 'EditDistributeFacilities')->middleware('auth')->name('edit-distribute-facilities');
    Route::post('ngo/update-distribute-facilities/{beneficiarie_id}/facility/{facility_id}', 'Updatedistributefacilities')->middleware('auth')->name('update-distribute-facilities');
    Route::get('ngo/distributed-facilities', 'distributefacilities')->middleware('auth')->name('distributed-list');
    Route::get('ngo/all-beneficiarie-list', 'allbeneficiarielist')->middleware('auth')->name('all-beneficiarie-list');
    Route::get('ngo/Pending-facilities', 'pendingfacilities')->middleware('auth')->name('pending-distribute-list');
    Route::get('ngo/beneficiarie-report-list', 'beneficiarieReportList')->middleware('auth')->name('beneficiarie-report-list');
    Route::get('ngo/show-beneficiarie-report/{beneficiarie_id}/facility/{facility_id}', 'showbeneficiariereport')->middleware('auth')->name('show-beneficiarie-report');
    Route::get('ngo/Survey-received-list', 'surveyrecivedlist')->middleware('auth')->name('survey-received-list');
});

Route::controller(StaffController::class)->group(function () {
    Route::get('ngo/add-position', 'addPosition')->middleware('auth')->name('add.position');
    Route::post('ngo/store-sposition', 'StorePosition')->middleware('auth')->name('store.position');
    Route::get('ngo/delete-position/{id}', 'DeletePosition')->middleware('auth')->name('delete.position');
    Route::get('ngo/position-list','PositionList')->middleware('auth')->name('position.list');
    Route::get('ngo/add-staff', 'addstaff')->middleware('auth')->name('add-staff');
    Route::post('ngo/store-staff', 'StoreStaff')->middleware('auth')->name('store.staff');
    Route::get('ngo/edit-staff/{id}', 'EditStaff')->middleware('auth')->name('edit-staff');
    Route::post('ngo/update-staff/{id}', 'UpdateStaff')->middleware('auth')->name('update.staff');
    Route::get('ngo/delete-staff/{id}', 'DeleteStaff')->middleware('auth')->name('delete-staff');
    Route::get('ngo/staff-list', 'staffList')->middleware('auth')->name('staff-list');
    Route::get('ngo/view-staff/{id}', 'ViewStaff')->middleware('auth')->name('view-staff');
    Route::get('ngo/staff-letter-list', 'staffListLetter')->middleware('auth')->name('staff.list.letter');
    Route::get('ngo/view-appointment/{id}', 'ViewAppointment')->middleware('auth')->name('view.appointment.letter');
    Route::get('ngo/view-resign/{id}', 'ViewResign')->middleware('auth')->name('view.resign.letter');
});

Route::controller(SallaryController::class)->middleware('auth')->group(function () {
    Route::get('ngo/salary-list', 'SalaryList')->name('list.salary');
    Route::get('ngo/add-salary', 'ManageSalary')->name('manage.salary');
    Route::post('ngo/store-salary', 'StoreSalary')->name('store.salary');
    Route::get('ngo/edit-salary/{id}', 'EditSalary')->name('edit.salary');
    Route::post('ngo/update-salary/{id}', 'UpdateSalary')->name('update.salary');
    Route::get('ngo/delete-salary/{id}', 'DeleteSalary')->name('delete.salary');
    Route::get('ngo/staff-salary', 'StaffSalary')->name('staff.salary');
    Route::get('ngo/pay-salary/{id}', 'PaySalary')->name('pay.salary');
    Route::post('ngo/store-salary/{id}', 'storeSalaryPayment')->name('store.salary.payment');
    Route::post('ngo/unpaid-salary/{id}','unpaySalary')->name('unpaid.salary');
    Route::get('ngo/salary-tranctions/{id}','salaryTransactions')->name('salary.transactions');
    Route::get('ngo/staff-passbook/{id}','staffPassbook')->name('salary.passbook');

});

Route::controller(WorkingAreaController::class)->group(function () {
    Route::get('ngo/working-area', 'workingarea')->middleware('auth')->name('working-area');
    Route::post('ngo/store-area', 'storeArea')->middleware('auth')->name('store-area');
    Route::get('ngo/working-area-list', 'workingAreaList')->middleware('auth')->name('working-area-list');
    Route::get('ngo/edit-area/{id}', 'editarea')->middleware('auth')->name('edit-area');
    Route::post('ngo/update-area/{id}', 'updatearea')->middleware('auth')->name('update-area');
    Route::get('ngo/delete-Working-area/{id}', 'removeArea')->middleware('auth')->name('remove-area');
});

Route::controller(IdcardController::class)->group(function () {
    Route::get('ngo/member-idcard', 'MemberIdcard')->middleware('auth')->name('member-idcard');
    Route::get('ngo/beneficiary-idcard', 'BeneficiaryIdcard')->name('beneficiary-idcard');
    Route::get('ngo/donor-idcard', 'DonorIdcard')->middleware('auth')->name('donor-idcard');
    Route::get('ngo/staff-idcard', 'StaffIdcard')->middleware('auth')->name('staff-idcard');
});
