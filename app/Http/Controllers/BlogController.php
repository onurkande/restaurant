<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    function index()
    {
        $records = Blog::all();
        return view('dashboard_blogs',['records'=>$records]);
    }
    function add()
    {
        return view('dashboard_add_blog');
    }

    function store(Request $request)
    {
        $blog = new Blog;

        $user_id = Auth::id();

        if($request->hasfile('titleImage'))
        {
            $file = $request->file('titleImage');
            $filename = $file->getClientOriginalName();
            $file->move('site/blogimage',$filename);
            $blog->titleImage = $filename;
        }

        $lines = $request->input('lines');
        $lines=json_encode($lines,JSON_UNESCAPED_UNICODE);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        $blog->lines = $lines;
        $blog->user_id = $user_id;

        $blog->save();
        return redirect('/dashboard-blogs')->with('store', "blog eklendi");
    }

    function edit($id)
    {
        $records = Blog::find($id);
        return view('dashboard_edit_blog',['records'=>$records]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect('/dashboard-blogs')->with('error', "Blog bulunamadı");
        }

        if($request->hasFile('titleImage'))
        {
            $path = 'site/blogimage/'.$blog->titleImage;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('titleImage');
            $filename = $file->getClientOriginalName();
            $file->move('site/blogimage',$filename);
            $blog->titleImage = $filename;
        }

        $lines = $request->input('lines');
        $lines = json_encode($lines, JSON_UNESCAPED_UNICODE);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->lines = $lines;

        $blog->save();

        return redirect('/dashboard-blogs')->with('update', "Blog güncellendi");
    }

    function delete($id)
    {
        $blog = Blog::find($id);
        if($blog->titleImage)
        {
            $path = 'site/blogimage/'.$blog->titleImage;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $blog->delete();
        return redirect('dashboard-blogs')->with('delete',"Blog silindi");
    }

    function view()
    {
        $records = Blog::all();
        return $records;
    }
}
