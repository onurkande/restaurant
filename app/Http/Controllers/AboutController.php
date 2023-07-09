<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    function index()
    {
        $records = About::first();
        return view('admin.about',['records'=>$records]);
    }

    function store(Request $request)
    {
        $about = new About;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/aboutImage',$filename);
            $about->image = $filename;
        }

        $title3 = $request->input('title3'); 
        $content3 = $request->input('content3'); 

        $messageRows = 
        [
            $title3,
            $content3
        ];

        $messageRows=json_encode($messageRows,JSON_UNESCAPED_UNICODE);

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
                    "content" => $content2[$index]
                ];
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        }

        $about->title = $request->input('title1');
        $about->message = $request->input('message');
        $about->info = $request->input('info');
        $about->content = $request->input('content1');

        $about->messageRows = $messageRows;
        $about->rows = $rows;

        $about->save();
        return redirect('dashboard/dynamic-edit/about')->with('store', "About eklendi");
    }

    function update(Request $request, $id)
    {
        $about = About::find($id);

        if($request->hasFile('image'))
        {
            $path = 'admin/aboutImage/'.$about->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/aboutImage',$filename);
            $about->image = $filename;
        }

        $title3 = $request->input('title3');
        $content3 = $request->input('content3');

        $messageRows = [
            $title3,
            $content3
        ];

        $messageRows = json_encode($messageRows, JSON_UNESCAPED_UNICODE);

        $title2 = $request->input('title2');
        $content2 = $request->input('content2');
        $icon = $request->input('icon');

        if ($title2 != null || $content2 != null || $icon != null) {
            $rowsCount = count($title2);
            $index = 0;
            $rows = array();
            while ($index < $rowsCount) {
                $rows[$title2[$index]] =
                [
                    "title" => $title2[$index],
                    "content" => $content2[$index]
                ];
                $index++;
            }
            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
        }

        $about->title = $request->input('title1');
        $about->message = $request->input('message');
        $about->info = $request->input('info');
        $about->content = $request->input('content1');

        $about->messageRows = $messageRows;
        $about->rows = $rows;

        $about->save();
        return redirect('dashboard/dynamic-edit/about')->with('update', "About güncellendi");
    }

    function view()
    {
        $records = About::first();
        return $records;
    }

    function deleteRow($title)
    {
        $about = About::first();

        if ($about) {
            $rows = json_decode($about->rows, true);

            if (isset($rows[$title]))
            {
                //dd($rows[$title]);
                unset($rows[$title]);
                $about->rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
                $about->save();
            }
        }

        return redirect('dashboard/dynamic-edit/about')->with('delete', 'Row deleted successfully');
    }

    function deleteAbout($id)
    {
        $about = About::find($id);
        if($about->image)
        {
            $path = public_path('admin/aboutImage');

            if(File::exists($path)) 
            {
                File::deleteDirectory($path);
            }
        }
        $about->delete();
        return redirect('dashboard/dynamic-edit/about')->with('delete',"About silindi");
    }
}
