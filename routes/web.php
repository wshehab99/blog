<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class,'index']);
Route::get('/post/{post:id}',[PostController::class,'show']);
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
