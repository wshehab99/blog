<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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
        $att = $this->postValidate();
        $att['user_id']=auth()->id();
        $path=request()->file('image')->store('posts');
        $att['image']=$path?asset('/storage/'.$path) :null;
        Post::create($att);
        return redirect("/");
    }
    public function edit(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.posts.edit',[
            'post'=>$post
        ]);
    }
    public function update(Post $post): \Illuminate\Http\RedirectResponse
    {
        $att = $this->postValidate();
        $path=request()->file('image')->store('posts');
        $att['image']=$path?asset('/storage/'.$path) :null;
        $post->update($att);
        return back()->with('success','Post updated successfully!');
    }
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->delete();
        return back()->with('success','Post deleted successfully!');
    }
    protected function postValidate(): array
    {
        return request()->validate([
            'title'=>['required'],
            'excerpt'=>['required'],
            'body'=>['required'],
            'category_id'=>['required'],
            'image'=>['image'],
        ]);
    }

}
