<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('dashboard.pages.home');
})->name('dashboard');

Route::get('/',function(){
    return view('blog.pages.posts');
})->name('index');
Route::get('/about',function(){
    return view('blog.pages.about');
})->name('about.view');
Route::get('/categories',function(){
    return view('blog.pages.category');
})->name('category.view');
Route::get('/contact',function(){
    return view('blog.pages.contact');
})->name('contact.view');
Route::get('/blog-single',function(){
    return view('blog.pages.blog-single');
})->name('blog-single.view');
