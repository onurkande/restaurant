<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'user_id',
        'titleImage',
        'title',
        'content',
        'lines',
        // 'image',
        // 'writer',
        // 'date',
        // 'title',
        // 'content',
        // 'title2',
        // 'content2',
        // 'rows',
        // 'title3',
        // 'image2',
        // 'content3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
