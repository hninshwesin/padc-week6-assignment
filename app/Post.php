<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'is_published', 'author_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getExcerptAttribute()
    {
        $exploded_string = explode(" ", $this->content);
        return collect($exploded_string)->take(20)->join(' ') . ' ...';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopePostOwner($query)
    {
        return $query->where('author_id', \Auth::user()->id);
    }

    public function scopeDefaultOrder($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->whereRaw('match(title,content) against (?)', $keyword);
//        return $query->where('title', 'like', '%' . $keyword . '%')
//            ->orWhere('content', 'like', '%' . $keyword . '%');
    }
}
