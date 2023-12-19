<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class,'index']);
Route::get('/post/{post:id}',[PostController::class,'show']);


