<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts'=>Post::latest()->paginate(20),
        ]);
    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.posts.create');
    }
    public function store(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $att = request()->validate([
            'title'=>['required'],
            'excerpt'=>['required'],
            'body'=>['required'],
            'category_id'=>['required'],
            'image'=>['image'],
        ]);
        $att['user_id']=auth()->id();
        $path=request()->file('image')->store('posts');
        $att['image']=$path?asset('/storage/'.$path) :null;
        Post::create($att);
        return redirect("/");
    }
}
