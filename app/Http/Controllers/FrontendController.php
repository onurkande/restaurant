<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FrontendController extends Controller
{
    function index()
    {
        $foods = app('App\Http\Controllers\FoodController')->view();
        $category = app('App\Http\Controllers\CategoryController')->view();
        return view('index', ['category' => $category,'foods' => $foods]);
    }

    function menu_detail($id)
    {
        $records = Food::find($id);
        return view('menu_details',['records'=>$records]);
    }

    function menu()
    {
        $foods = app('App\Http\Controllers\FoodController')->view();
        return view('menu',['foods'=>$foods]);
    }
}
