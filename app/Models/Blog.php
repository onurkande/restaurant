<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'user_id',
        'image',
        'writer',
        'date',
        'title',
        'content',
        'title2',
        'content2',
        'rows',
        'title3',
        'image2',
        'content3',
    ];

    public function user()
    {
        return $this->belongsTo(Category::class,'user_id','id');
    }
}
