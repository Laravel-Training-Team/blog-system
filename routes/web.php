<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('dashboard.pages.home');
})->name('index');

Route::group(['middleware' => ['role:admin']], function () { 
   Route::resource('roles',RoleController::class);
Route::get('roles/giveRolePermission/{id}',[RoleController::class,'addPermissionToRole'])->name('roles.add_permission_to_role');
Route::put('roles/giveRolePermission/{id}',[RoleController::class,'updatePermissionToRole'])->name('roles.update_permission_to_role');

});
