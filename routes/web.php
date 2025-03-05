<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.pages.home');
})->name('index');

Route::resource('roles',RoleController::class);
