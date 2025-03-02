<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.pages.home');
})->name('index');
