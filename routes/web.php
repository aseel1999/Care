<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
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



Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('dashboard-home');

Route::middleware('guest')->group(function () {
    Route::get('/admin-login', '\App\Http\Controllers\AdminController@showLogin')->name('admin-login');
    Route::post('/admin_log', '\App\Http\Controllers\AdminController@adminLogin')->name('dashboard_login');
});

Route::prefix('/dashboard')->middleware('auth:admin')->group(function () {
    
    
    Route::resource('/admin/doctors','\App\Http\Controllers\Admin\DoctorsController');
    Route::resource('/admin/specialties','\App\Http\Controllers\Admin\SpecialtiesController'); 
    Route::get('/patients', '\App\Http\Controllers\PatientListController@index')->name('patients');
    Route::get('/patientList/{id}',[PatientListController::class,'show'])->name('patientlist');
    Route::get('/status/update/{id}', '\App\Http\Controllers\PatienListController@toggleStatus')->name('update.status');
    Route::get('/all-patients', '\App\Http\Controllers\PatientListController@allTimeAppointment')->name('all.appointments');
    Route::resource('appoinment', '\App\Http\Controllers\AppoinmentController');
    Route::post('/appoinment/check', '\App\Http\Controllers\AppoinmentController@check')->name('appointment.check');
    Route::post('/appoinment/update', '\App\Http\Controllers\AppoinmentController@updateTime')->name('update');
    Route::get('/user-profile', '\App\Http\Controllers\ProfileController@index')->name('profile');
    Route::post('/user-profile', '\App\Http\Controllers\ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', '\App\Http\Controllers\ProfileController@profilePic')->name('profile.pic');
    Route::resource('/contact', '\App\Http\Controllers\ContactController');
    Route::get('/review', '\App\Http\Controllers\ReviewController@index');



});



//Route::get('/welcome/to/laravel','\App\Http\Controllers\DoctorController@welcome')->name('welcome.index');
//Route::get('/welcome.php',[DoctorController::class,'welcome']);
//Route::match(['get','post','put'],'match','DoctorConttroller@welcome');
//Route::redirect('home','/');
//Route::get('specializets',[SpecializetsController::class,'index']);
//Route::get('specializets/{name?}',[SpecializetsController::class,'show']);


