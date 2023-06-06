<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'food';
    protected $fillable = [
        'cate_id',
        'name',
        'image',
        'slug',
        'oldprice',
        'title',
        'price',
        'extra',
        'desc',
        'desc_row'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
