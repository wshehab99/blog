<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailchimpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

//auth
//register
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
//login
Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->middleware('guest');
//logout
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
//comment
Route::post('/post/{post:id}/comment',[Comment::class,'store']);
//mailchimp
Route::post('/newsletter',[MailchimpController::class,'subscribe']);

//posts
Route::get('/', [PostController::class,'index']);
Route::get('/post/{post:id}',[PostController::class,'show']);
//admin
Route::get('/admin/post/create',[AdminPostController::class,'create'])->middleware('admin');
Route::post('/post/create',[AdminPostController::class,'store'])->middleware('admin');
Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('admin');
