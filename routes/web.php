<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('posts',[
        "posts"=>Post::with('category')->get(),
    ]);
});
Route::get('/post/{id}',function ($id){
    return view('post',[
        'post'=>Post::find($id),
    ]);
});
Route::get('/category/{id}',function ($id){
    return view('category',[
        'category'=>Category::find($id)
    ]);
});
Route::get('/users/{user:username}',function (User $user){
    return view('category',[
        'category'=>User::find($user->id)
    ]);
});

