<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        $foods = app('App\Http\Controllers\FoodController')->view();;
        $category = app('App\Http\Controllers\CategoryController')->view();
        
        
        return view('index', compact([
            'category' => $category,
            'foods' => $foods,
        ]));
    }

}
