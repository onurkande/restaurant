<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_choose;
use Illuminate\Support\Facades\File;

class AboutChooseController extends Controller
{
    function index()
    {
        $records = About_choose::first();
        return view('admin.about_choose',['records'=>$records]);
    }

    function store(Request $request)
    {
        $about_choose = new About_choose;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/aboutChooseImage',$filename);
            $about_choose->image = $filename;
        }


        $title2 = $request->input('title2');
        $content2 = $request->input('content2');
        $icon = $request->input('icon');

        if($title2 != null or $content2 != null or $icon != null)
        {
            $rowsCount = count($title2);
            $index = 0;
            $rows = array();
            while($index < $rowsCount){
                $rows[$title2[$index]] = 
                [
                    "title" => $title2[$index],
                    "content" => $content2[$index],
                    "icon" => $icon[$index]
                ];
                $index++;
            }
            // dd(gettype($rows));
            // dd($rows);
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        }
    
        $about_choose->title = $request->input('title1');
        $about_choose->message = $request->input('message');
        $about_choose->content = $request->input('content1');
        $about_choose->rows = $rows;

        $about_choose->save();
        return redirect('dashboard/dynamic-edit/about_choose')->with('store', "About Choose eklendi");
    }

    function update(Request $request, $id)
    {
        $about_choose = About_choose::find($id);

        if($request->hasFile('image'))
        {
            $path = 'admin/aboutChooseImage/'.$about_choose->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/aboutChooseImage',$filename);
            $about_choose->image = $filename;
        }

        $title2 = $request->input('title2');
        $content2 = $request->input('content2');
        $icon = $request->input('icon');

        if ($title2 != null || $content2 != null || $icon != null) {
            $rowsCount = count($title2);
            $index = 0;
            $newRows = array();
            while ($index < $rowsCount) {
                $newRows[$title2[$index]] = [
                    "title" => $title2[$index],
                    "content" => $content2[$index],
                    "icon" => $icon[$index]
                ];
                $index++;
            }
        }

        // $oldRows = $about_choose->rows;
        // $oldRows = json_decode($about_choose->rows, TRUE);

        // $rows = array_merge($oldRows, $newRows);

        $rows = json_encode($newRows, JSON_UNESCAPED_UNICODE);


        $about_choose->title = $request->input('title1');
        $about_choose->message = $request->input('message');
        $about_choose->content = $request->input('content1');
        $about_choose->rows = $rows;

        $about_choose->save();
        return redirect('dashboard/dynamic-edit/about_choose')->with('update', "About Choose güncellendi");
    }

    function view()
    {
        $records = About_choose::first();
        return $records;
    }

    function deleteRow($title)
    {
        $aboutChoose = About_choose::first();

        if ($aboutChoose) {
            $rows = json_decode($aboutChoose->rows, true);

            if (isset($rows[$title]))
            {
                // dd($rows[$title]);
                unset($rows[$title]);
                $aboutChoose->rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
                $aboutChoose->save();
            }
        }

        return redirect('dashboard/dynamic-edit/about_choose')->with('delete', 'Row deleted successfully');
    }

    function deleteAboutChoose($id)
    {
        $about_choose = About_choose::find($id);
        if($about_choose->image)
        {
            $path = public_path('admin/aboutChooseImage');

            if(File::exists($path)) 
            {
                File::deleteDirectory($path);
            }
        }
        $about_choose->delete();
        return redirect('dashboard/dynamic-edit/about_choose')->with('delete',"About Choose silindi");
    }

}
