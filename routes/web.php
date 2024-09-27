<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', fn()=> view('welcome'));
Route::get('/', HomeController::class)->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');
//Route::get('/users',[UserController::class, 'index'])->name('users');
//Route::get('/users/create',[UserController::class, 'create'])->name('userCreate');
//Route::post('/users',[UserController::class,'store' ])->name('users');
//Route::get('/users/{user:id}',[UserController::class,'show' ]);
//Route::get('/users/{user:id}/edit',[UserController::class,'edit' ]);
//Route::put('/users/{user:id}',[UserController::class,'update' ]);

//Route::controller(UserController::class)
//    ->prefix('users')
//    ->group(function(){
//        Route::get('/', 'index')->name('user');
//        Route::get('/create','create')->name('userCreate');
//        Route::post('/','store' )->name('users');
//        Route::get('/{user:id}','show' );
//        Route::get('/{user:id}/edit','edit');
//        Route::put('/{user:id}','update' );
//    });

Route::resource('users',UserController::class)->middleware('auth');
Route::get('login',[LoginController::class,'loginForm'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'authenticate'])->middleware('guest');
Route::post('logout',LogoutController::class)->name('logout')->middleware('auth');
