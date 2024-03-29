<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'blog_id',
        'parent_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
}
