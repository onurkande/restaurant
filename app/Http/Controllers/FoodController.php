<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    function index()
    {
        $foods = Food::all();
        return view('admin.food',['foods'=>$foods]);
    }

    function add()
    {
        return view('admin.add-food');
    }

    function store(Request $request)
    {
        $category = new Food;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/image',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect('dashboard/dynamic-edit/categories')->with('store',"Category eklendi");
    }
}
