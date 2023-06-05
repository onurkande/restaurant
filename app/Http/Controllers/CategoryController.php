<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    function index()
    {
        $records = Category::all();
        return view('admin.categories',['records'=>$records]);
    } 

    function add()
    {
        return view('admin.add-category');
    }
    
    function store(Request $request)
    {
        $category = new Category;
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

    function edit($id)
    {
        $records = Category::find($id);
        return view('admin.edit-category',['records'=>$records]);
    }

    function update(Request $request,$id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'admin/image/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/image',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->update();
        return redirect('dashboard/dynamic-edit/categories')->with('update',"Category güncellendi");
    }

    function delete($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'admin/image/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('dashboard/dynamic-edit/categories')->with('delete',"Category silindi");
    }
}
