<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/',[HomeController::Class,'index']);

Route::get('/home',[HomeController::Class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::Class,'addview']);

Route::post('/upload_doctor',[AdminController::Class,'upload']);

Route::post('/appointment',[HomeController::Class,'appointment']);

Route::get('/myappointment',[HomeController::Class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::Class,'cancel_appoint']);

Route::get('/showappointment',[AdminController::Class,'showappointment']);

Route::get('/approved/{id}',[AdminController::Class,'approved']);

Route::get('/canceled/{id}',[AdminController::Class,'canceled']);

Route::get('/showdoctor',[AdminController::Class,'showdoctor']);

Route::get('/removedoctor/{id}',[AdminController::Class,'removedoctor']);

Route::get('/updatedoctor/{id}',[AdminController::Class,'updatedoctor']);

Route::get('/admin/get-users', [AdminController::class, 'getUsers'])->name('admin.getUsers');

Route::post('/editdoctor/{id}',[AdminController::Class,'editdoctor']);

Route::get('/emailview/{id}',[AdminController::Class,'emailview']);

Route::get('/deleteUser/{id}',[AdminController::Class,'deleteUser']);

Route::get('/editUser/{id}', [AdminController::class, 'editUser']);

Route::post('/updateUser/{id}', [AdminController::class, 'updateUser']);

Route::post('/sendemail/{id}',[AdminController::Class,'sendemail']);