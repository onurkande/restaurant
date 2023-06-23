<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\File;

class ChefController extends Controller
{
    function index()
    {
        $records = Chef::all();
        return view('admin.chefs',['records'=>$records]);
    }

    function add()
    {
        return view('admin.add-chefs');
    }

    function store(Request $request)
    {
        $chefs = new Chef;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/chefsimage',$filename);
            $chefs->image = $filename;
        }

        $icons = $request->input('icons');
        $icons=json_encode($icons,JSON_UNESCAPED_UNICODE);

        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl=json_encode($iconsUrl,JSON_UNESCAPED_UNICODE);

        $chefs->name = $request->input('name');
        $chefs->position = $request->input('position');

        $chefs->icons = $icons;
        $chefs->iconsUrl = $iconsUrl;

        $chefs->save();
        return redirect('dashboard/dynamic-edit/chefs')->with('store',"Chef eklendi");
    }

    function edit($id)
    {
        $records = Chef::find($id);
        return view('admin.edit-chefs',['records'=>$records]);
    }

    function update(Request $request,$id)
    {
        $chefs = Chef::find($id);
        if($request->hasFile('image'))
        {
            $path = 'admin/chefsimage/'.$chefs->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/chefsimage',$filename);
            $chefs->image = $filename;
        }

        $icons = $request->input('icons');
        $icons=json_encode($icons,JSON_UNESCAPED_UNICODE);

        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl=json_encode($iconsUrl,JSON_UNESCAPED_UNICODE);

        $chefs->name = $request->input('name');
        $chefs->position = $request->input('position');

        $chefs->icons = $icons;
        $chefs->iconsUrl = $iconsUrl;

        $chefs->update();
        return redirect('dashboard/dynamic-edit/chefs')->with('update',"Chef Güncellendi");
    }

    function delete($id)
    {
        $chefs = Chef::find($id);
        if($chefs->image)
        {
            $path = 'admin/chefsimage/'.$chefs->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $chefs->delete();
        return redirect('dashboard/dynamic-edit/chefs')->with('delete',"Chef silindi");
    }

    function view()
    {
        $records = Chef::all();
        return $records;
    }
}
