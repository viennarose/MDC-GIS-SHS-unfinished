<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Auth\AuthIndexController;
use App\Http\Controllers\Normal_View\IndexController;
use App\Http\Controllers\Normal_View\NormalActivityController;
use App\Http\Controllers\Normal_View\NormalAnnouncementController;
use App\Http\Controllers\Normal_View\NormalContactUsController;
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
    Route::get('/admin/announcements', [AnnouncementController::class, 'announcement']);


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
    Route::get('/admin/announcements/create', [AnnouncementController::class, 'announcementCreate'])->name('announcements.create');
    Route::post('/admin/announcements/create', [AnnouncementController::class, 'announcementStore']);
    Route::get('/admin/announcements/{id}/update', [AnnouncementController::class, 'announcementUpdate'])->name('admin.announcements.update');
});
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', [IndexController::class, 'dashboardNormal']);
});
