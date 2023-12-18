<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index']);
Route::get('/post/{post:id}',[PostController::class,'show']);
Route::get('/category/{category}',function (Category $category){
    return view('posts',[
        "posts"=>$category->posts,
        "categories"=>Category::all(),
        'currentCategory'=>$category,
    ]);
});
Route::get('/users/{user:username}',function (User $user){
    return view('category',[
        'category'=>User::find($user->id)
    ]);
});

