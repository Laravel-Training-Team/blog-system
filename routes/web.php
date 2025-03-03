<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerification;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\User\SessionUserController;
use App\Http\Controllers\Admin\ForgetAdminController;
use App\Http\Controllers\Admin\SessionAdminController;
use App\Http\Controllers\User\RegisteredUserController;
use App\Http\Controllers\Writer\SessionWriterController;
use App\Http\Controllers\Admin\RegisteredAdminController;
use App\Http\Controllers\User\UserForgotPasswordController;
use App\Http\Controllers\Writer\RegisteredWriterController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminregister', [RegisteredAdminController::class, 'create'])->name('adminregister');
Route::post('/adminregister', [RegisteredAdminController::class, 'store']);

Route::get('/adminlogin', [SessionAdminController::class, 'create'])->name('adminlogin');
Route::post('/adminlogin', [SessionAdminController::class, 'store']);
Route::post('/adminlogout', [SessionAdminController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('userregister');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionUserController::class, 'create'])->name('userlogin');
Route::post('/login', [SessionUserController::class, 'store']);
Route::post('/logout', [SessionUserController::class, 'destroy']);
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [EmailVerification::class, 'verifyNotice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerification::class, 'verifyEmail'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerification::class, 'verifyHandler'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});


Route::get('/writerregister', [RegisteredWriterController::class, 'create'])->name('writerregister');
Route::post('/writerregister', [RegisteredWriterController::class, 'store']);
Route::get('/writerlogin', [SessionWriterController::class, 'create'])->name('writerlogin');
Route::post('/writerlogin', [SessionWriterController::class, 'store']);
Route::post('/writerlogout', [SessionWriterController::class, 'destroy']);

  

Route::get('forgot-password', [UserForgotPasswordController::class, 'showResetForm'])->name('forgetpassword');
Route::post('forgot-password', [UserForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendemail');

Route::get('reset-password/{token}', [UserForgotPasswordController::class, 'showResetPasswordForm'])->name('resetpassword');
Route::post('reset-password', [UserForgotPasswordController::class, 'resetPassword'])->name('updatepassword');

Route::get('dashforgot-password', [ForgotPasswordController::class, 'showResetForm'])->name('dashforgetpassword');
Route::post('dashforgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('dashsendemail');

Route::get('dashreset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('dashresetpassword');
Route::post('dashreset-password', [ForgotPasswordController::class, 'resetPassword'])->name('dashupdatepassword');
