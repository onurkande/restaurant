<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    function index()
    {
        $records = Food::all();
        return view('admin.food',['records'=>$records]);
    }

    function add()
    {
        $records = Category::all();
        return view('admin.add-food',['records'=>$records]);
    }

    function store(Request $request)
    {
        $food = new Food;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/foodimage',$filename);
            $food->image = $filename;
        }

        $price = $request->input('price');
        $price=json_encode($price,JSON_UNESCAPED_UNICODE);
        
        $oldprice = $request->input('oldprice');
        $oldprice=json_encode($oldprice,JSON_UNESCAPED_UNICODE);

        $extra = $request->input('extra');
        $extra=json_encode($extra,JSON_UNESCAPED_UNICODE);

        $desc_row = $request->input('desc_row');
        $desc_row=json_encode($desc_row,JSON_UNESCAPED_UNICODE);

        $food->name = $request->input('name');
        $food->title = $request->input('title');
        $food->slug = $request->input('slug');
        $food->desc = $request->input('desc');
        $food->cate_id = $request->input('cate_id');
        
        $food->oldprice = $oldprice;
        $food->price = $price;
        $food->extra = $extra;
        $food->desc_row = $desc_row;
        $food->save();
        return redirect('dashboard/dynamic-edit/foods')->with('store',"Food eklendi");
    }

    function edit($id)
    {
        $records = Food::find($id);
        return view('admin.edit-food',['records'=>$records]);
    }

    function update(Request $request,$id)
    {
        $food = Food::find($id);
        if($request->hasFile('image'))
        {
            $path = 'admin/foodimage/'.$food->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/foodimage',$filename);
            $food->image = $filename;
        }

        $price = $request->input('price');
        $price=json_encode($price,JSON_UNESCAPED_UNICODE);

        $oldprice = $request->input('oldprice');
        $oldprice=json_encode($oldprice,JSON_UNESCAPED_UNICODE);

        $extra = $request->input('extra');
        $extra=json_encode($extra,JSON_UNESCAPED_UNICODE);

        $desc_row = $request->input('desc_row');
        $desc_row=json_encode($desc_row,JSON_UNESCAPED_UNICODE);

        $food->name = $request->input('name');
        $food->title = $request->input('title');
        $food->slug = $request->input('slug');
        $food->desc = $request->input('desc');
        $food->cate_id = $request->input('cate_id');

        $food->price = $price;
        $food->oldprice = $oldprice;
        $food->extra = $extra;
        $food->desc_row = $desc_row;
        $food->update();
        return redirect('dashboard/dynamic-edit/foods')->with('update',"Food güncellendi");
    }
}
