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
        'price',
        'oldprice',
        'title',
        'size',
        'extra',
        'amount',
        'desc',
        'desc_row'
    ];
}
