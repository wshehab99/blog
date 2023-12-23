<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function store($postId): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'body'=>['required']
        ]);
        Comment::create([
            'user_id'=>auth()->id(),
            'post_id'=>$postId,
            'body'=>request('body'),
        ]);
        return back();
    }
}
