<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Blog;
use App\Models\Comment;

class FrontendController extends Controller
{
    function index()
    {
        $foods = app('App\Http\Controllers\FoodController')->view();
        $category = app('App\Http\Controllers\CategoryController')->view();
        $chefs = app('App\Http\Controllers\ChefController')->view();
        $banner = app('App\Http\Controllers\BannerController')->view();
        $header = app('App\Http\Controllers\HeaderController')->view();
        $blogs = app('App\Http\Controllers\BlogController')->view();
        return view('index', ['category' => $category,'foods' => $foods,'chefs' => $chefs,'banner' => $banner,'header' => $header,'blogs' => $blogs]);
    }

    function menu_detail($id)
    {
        // global $tutulanid;
        // $tutulanid = $id;
        $records = Food::find($id);
        return view('menu_details',['records'=>$records]);
    }

    function menu_detail_livewere() {
        global $tutulanid;
        return $tutulanid;
    }

    function menu()
    {
        // $foods = Food::paginate(1);
        $foods = app('App\Http\Controllers\FoodController')->view();
        return view('menu',['foods'=>$foods]);
    }

    function about()
    {
        $records = app('App\Http\Controllers\AboutController')->view();
        return view('about',['records'=>$records]);
    }

    function blog_detail($id)
    {
        $records = Blog::find($id);
        $blog = Blog::findOrFail($id);
        $comments = $blog->comments()->orderBy('created_at', 'desc')->get();
        return view('blog_details',['records'=>$records,'comments'=>$comments]);
    }

    function blogs()
    {
        $records = Blog::all();
        return view('blogs',['records'=>$records]);
    }
}
