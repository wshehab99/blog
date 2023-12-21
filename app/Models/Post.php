<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with=['category','author'];
    protected $guarded=[];
//    protected $fillable=['title','excerpt','body','category_id'];
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter($query,array $filters): void
    {
        //search filter
        $query->when($filters['search']?? false, fn($query, $search)=> $query
            ->where(fn($query)=> $query
                ->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%'))
        );
        //category filter
        $query->when($filters['category']?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
                    $query->where('id', $category)
                ));
        //author filter
        $query->when($filters['author']?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
                ));
    }
}
