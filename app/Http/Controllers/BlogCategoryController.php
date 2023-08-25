<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\File;

class BlogCategoryController extends Controller
{
    function index()
    {
        $records = BlogCategory::all();
        return view('admin.blog-category',['records'=>$records]);
    }

    function add()
    {
        return view('admin.add-blog-category');
    }

    function store(Request $request)
    {
        $BlogCategory = new BlogCategory;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('admin/BlogCategoryImage',$filename);
            $BlogCategory->image = $filename;
        }

        $BlogCategory->name = $request->input('name');
        $BlogCategory->slug = $request->input('slug');
        $BlogCategory->save();
        return redirect('dashboard/dynamic-edit/blog-category')->with('store',"Category eklendi");
    }

    function edit($id)
    {
        $records = BlogCategory::find($id);
        return view('admin.edit-blog-category',['records'=>$records]);
    }

    public function update(Request $request, $id)
    {
        $BlogCategory = BlogCategory::find($id);

        if($request->hasFile('image'))
        {
            $path = 'admin/BlogCategoryImage/'.$BlogCategory->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('admin/BlogCategoryImage',$filename);
            $BlogCategory->image = $filename;
        }

        $BlogCategory->name = $request->input('name');
        $BlogCategory->slug = $request->input('slug');
        $BlogCategory->save();
        return redirect('dashboard/dynamic-edit/blog-category')->with('update',"Category güncellendi");
    }

    function delete($id)
    {
        $BlogCategory = BlogCategory::find($id);
        if($BlogCategory->image)
        {
            $path = 'admin/BlogCategoryImage/'.$BlogCategory->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $BlogCategory->delete();
        return redirect('dashboard/dynamic-edit/blog-category')->with('delete',"Category silindi");
    }
}
