<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\Admin_ChangePasswordController;
use App\Http\Controllers\Admin\Admin_ProfileController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\Questionnaires\CounselingController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthIndexController;
use App\Http\Controllers\Normal_View\ChangePasswordController;
use App\Http\Controllers\Normal_View\IndexController;
use App\Http\Controllers\Normal_View\NormalActivityController;
use App\Http\Controllers\Normal_View\NormalAnnouncementController;
use App\Http\Controllers\Normal_View\NormalContactUsController;
use App\Http\Controllers\Normal_View\ProfileController;
use App\Http\Controllers\Normal_View\SetAppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/about-us', [IndexController::class, 'about']);
Route::get('/dashboard', [IndexController::class, 'dashboardNormal']);
Route::get('/contact-us', [NormalContactUsController::class, 'contact']);
Route::post('/contact-us', [NormalContactUsController::class, 'contactUsStore'])->name('contact-us.submit');
Route::get('/announcements', [NormalAnnouncementController::class, 'announcement']);
Route::get('/view-activities', [NormalActivityController::class, 'activities']);
Route::get('/services', [IndexController::class, 'services']);
Route::get('/set-appointment', [SetAppointmentController::class, 'setAppointment']);
Route::post('/set-appointment', [SetAppointmentController::class, 'store'])->name('appointment.set');

Route::get('/login', [AuthIndexController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthIndexController::class, 'login']);
Route::post('/logout', [AuthIndexController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthIndexController::class, 'registerForm'])->name('register');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/chats', [ChatsController::class, 'chats']);


    Route::get('/admin/feedbacks', [FeedbackController::class, 'feedbacks'])->name('feedbacks.feedbacks');



    Route::get('/admin/users', [UsersController::class, 'users'])->name('users.users');
    Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');
    Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');


    Route::get('/admin/activities', [ActivityController::class, 'activities'])->name('activities.activities');
    Route::post('/admin/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::put('/admin/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/admin/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');

    Route::get('/admin/appointments', [AppointmentController::class, 'appointments'])->name('appointments.appointments');
    Route::post('/admin/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::put('/admin/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/admin/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::put('/appointments/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    Route::get('/admin/messages', [ContactUsController::class, 'message']);

    Route::get('/admin/counseling', [CounselingController::class, 'counseling']);
    Route::get('/admin/counselings/create', [CounselingController::class, 'counselingCreate'])->name('counselings.create');
    Route::post('/admin/counselings/create', [CounselingController::class, 'counselingstore']);
    Route::get('/admin/counselings/{id}/update', [CounselingController::class, 'counselingEdit']);
    Route::put('/admin/counselings/{id}/update', [CounselingController::class, 'counselingUpdate'])->name('admin.counselings.update');
    Route::delete('/admin/counselings/{id}', [CounselingController::class, 'destroy'])->name('counselings.destroy');
    Route::get('admin/counselings/pdf/{id}', [CounselingController::class, 'downloadPDF'])
    ->name('admin.counselings.pdf');
    Route::get('admin/counselings/print/{id}', [CounselingController::class, 'printCounseling'])
    ->name('admin.counselings.print');

    Route::get('/admin/announcements', [AnnouncementController::class, 'announcement']);
    Route::get('/admin/announcements/create', [AnnouncementController::class, 'announcementCreate'])->name('announcements.create');
    Route::post('/admin/announcements/create', [AnnouncementController::class, 'announcementStore']);
    Route::get('/admin/announcements/{id}/update', [AnnouncementController::class, 'announcementUpdate'])->name('admin.announcements.update');

    Route::get('admin/profile', [Admin_ProfileController::class, 'index'])->name('admin.profile');
    Route::put('admin/update-profile/{id}', [Admin_ProfileController::class, 'update_profile'])->name('admin.change_profile');
    Route::get('admin/change-password/{id}', [Admin_ChangePasswordController::class, 'index'])->name('admin.change_password.index');
    Route::post('admin/change-password', [Admin_ChangePasswordController::class, 'change_password'])->name('admin.change_password');

});
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', [IndexController::class, 'dashboardNormal']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/update-profile/{id}', [ProfileController::class, 'update_profile'])->name('change_profile');
    Route::get('/change-password/{id}', [ChangePasswordController::class, 'index'])->name('change_password.index');
    Route::post('/change-password', [ChangePasswordController::class, 'change_password'])->name('change_password');
});
