<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.index',[
            "posts"=>Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
        ]);
    }
    public function show(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.show',[
            'post'=>Post::find($post->id),
        ]);
    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.create');
    }
    public function store(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $path=request()->file('image')->store();
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
