<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    public function comment()
    {
    	return $this->hasMany(PostComment::class,'blog_post_id');
    }

    public function like_post()
    {
        return $this->hasMany(PostLike::class,'blog_post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
