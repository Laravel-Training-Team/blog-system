<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\EmailVerification;
use App\Http\Controllers\User\SessionUserController;
use App\Http\Controllers\User\RegisteredUserController;
use App\Http\Controllers\User\UserForgetPasswordController;
use App\Http\Controllers\Dashboard\SessionDashboardController;
use App\Http\Controllers\dashboard\RegisteredDashboardController;
use App\Http\Controllers\dashboard\DashboardForgetPasswordController;

Route::get('/', function () {
    return view('dashboard.pages.home');
})->name('index');

Route::group(['middleware' => ['role:admin']], function () { 
   Route::resource('roles',RoleController::class);
Route::get('roles/giveRolePermission/{id}',[RoleController::class,'addPermissionToRole'])->name('roles.add_permission_to_role');
Route::put('roles/giveRolePermission/{id}',[RoleController::class,'updatePermissionToRole'])->name('roles.update_permission_to_role');

});
    Route::get('/dashboardlogin', [SessionDashboardController::class, 'create'])->name('dashboard.login');
    Route::post('/dashboardlogin', [SessionDashboardController::class, 'store']);

    Route::post('/dashboardlogout', [SessionDashboardController::class, 'destroy'])->name('dashboard.logout');

    Route::get('/login', [SessionUserController::class, 'create'])->name('user.login');
    Route::post('/login', [SessionUserController::class, 'store']);

    Route::post('/logout', [SessionUserController::class, 'destroy'])->name('user.logout');


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

    
Route::get('forgot-password', [UserForgetPasswordController::class, 'showResetForm'])->name('forgetpassword');
Route::post('forgot-password', [UserForgetPasswordController::class, 'sendResetLinkEmail'])->name('sendemail');

Route::get('reset-password/{token}', [UserForgetPasswordController::class, 'showResetPasswordForm'])->name('resetpassword');
Route::post('reset-password', [UserForgetPasswordController::class, 'resetPassword'])->name('updatepassword');

Route::get('dashforgot-password', [DashboardForgetPasswordController::class, 'showResetForm'])->name('dashforgetpassword');
Route::post('dashforgot-password', [DashboardForgetPasswordController::class, 'sendResetLinkEmail'])->name('dashsendemail');

Route::get('dashreset-password/{token}', [DashboardForgetPasswordController::class, 'showResetPasswordForm'])->name('dashresetpassword');
Route::post('dashreset-password', [DashboardForgetPasswordController::class, 'resetPassword'])->name('dashupdatepassword');


    
