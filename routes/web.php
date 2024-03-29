<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ClinicsController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\DoctorsController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PatientsController;
use App\Http\Controllers\Dashboard\ReservationsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\SpecilizationsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', [\App\Http\Controllers\Front\HomeController::class,'index']);

    Route::group(['prefix' => 'admin','name' => 'admin.'],function (){
        Route::name('admin.')->group(function (){
            Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
            Route::post('login', [AuthController::class, 'login'])->name('startSession');

            Route::get('get_clinic_specializations', [ReservationsController::class,'get_clinic_specializations'])->name('get_clinic_specializations');

            Route::group(['middleware' => ['auth','ckeckBlocked']],function (){
                //Home
                Route::get('home',[HomeController::class,'index'])->name('home');
                Route::get('destroy',[AuthController::class,'logout'])->name('logout');

                //Roles And Permissions
                Route::resource('roles', RolesController::class);
                Route::post('permission/add',[RolesController::class,'add_permission'])->name('add_permission');

                //Doctors
                Route::resource('doctors', DoctorsController::class);

                //Specializations
                Route::resource('specializations', SpecilizationsController::class);

                //Clinics
                Route::resource('clinics', ClinicsController::class);
                Route::get('edit_profile', [ClinicsController::class,'edit_profile'])->name('clinic.edit-profile');
                Route::post('update_profile', [ClinicsController::class,'update_profile'])->name('clinic.update-profile');
                Route::post('update_profile_password', [ClinicsController::class,'update_profile_password'])->name('clinic.update-profile-password');

                //Patients
                Route::resource('patients', PatientsController::class);

                //Reservations
                Route::resource('reservations', ReservationsController::class);
                Route::get('today_reservations', [ReservationsController::class,'today_reservations'])->name('today_reservations');
                Route::post('/reservations/change_status', [ReservationsController::class,'change_status'])->name('change_status');
                Route::post('/reservations/update_note', [ReservationsController::class,'update_note'])->name('reservations.update_note');


                //Settings
                Route::get('settings/main-section', [SettingsController::class,'main_section'])->name('settings.main-section');
                Route::post('settings/main-section/update', [SettingsController::class,'main_section_update'])->name('settings.main-section.update');
                Route::post('settings/footer/update', [SettingsController::class,'footer_update'])->name('settings.footer.update');
                Route::post('settings/about/update', [SettingsController::class,'about_update'])->name('settings.about.update');
                Route::post('settings/services/update', [SettingsController::class,'services_update'])->name('settings.services.update');

                // Contact Us
                Route::get('contact-us-view',[ContactsController::class,'contact_us_view'])->name('contactUs.contact-us-view');
                Route::post('contact-us-delete/{id?}',[ContactsController::class,'contact_us_delete'])->name('contactUs.contact-us-delete');


                // Notifications
                Route::get('mark-all-read',[ReservationsController::class,'mark_all_read'])->name('user.mark-all-read');

            });


        });

    });

    //home routes
    Route::get('checkPatientExistence',[\App\Http\Controllers\Front\ReservationsController::class,'checkPatientExistence'])->name('home.checkPatientExistence');
    Route::post('storeReservation',[\App\Http\Controllers\Front\ReservationsController::class,'storeReservation'])->name('home.storeReservation');
    Route::post('send-contact-us',[ContactsController::class,'save_contact_us'])->name('home.send-contact-us');
});
