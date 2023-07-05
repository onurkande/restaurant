<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
{
    function index()
    {
        $records = Header::first();
        return view('admin.header',['records'=>$records]);
    }

    function store(Request $request)
    {
        $header = new Header;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/headerimage',$filename);
            $header->image = $filename;
        }

        if($request->hasfile('indexImage'))
        {
            $indexImagefile = $request->file('indexImage');
            $indexImageext = $indexImagefile->getClientOriginalExtension();
            $indexImagefilename = uniqid().'.'.$indexImageext;
            $indexImagefile->move('admin/headerimage',$indexImagefilename);
            $header->indexImage = $indexImagefilename;
        }

        if($request->hasfile('opImage'))
        {
            $opImagefile = $request->file('opImage');
            $opImageext = $opImagefile->getClientOriginalExtension();
            $opImagefilename = uniqid().'.'.$opImageext;
            $opImagefile->move('admin/headerimage',$opImagefilename);
            $header->opImage = $opImagefilename;
        }

        $header->imageUrl = $request->input('imageUrl');

        $infoRows = $request->input('infoRows');
        $infoRows = json_encode($infoRows, JSON_UNESCAPED_UNICODE);
        $header->infoRows = $infoRows;

        $infoRowsUrl = $request->input('infoRowsUrl');
        $infoRowsUrl = json_encode($infoRowsUrl, JSON_UNESCAPED_UNICODE);
        $header->infoRowsUrl = $infoRowsUrl;

        $infoRowsIcon = $request->input('infoRowsIcon');
        $infoRowsIcon = json_encode($infoRowsIcon, JSON_UNESCAPED_UNICODE);
        $header->infoRowsIcon = $infoRowsIcon;


        $icons = $request->input('icons');
        $icons = json_encode($icons, JSON_UNESCAPED_UNICODE);
        $header->icons = $icons;

        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl = json_encode($iconsUrl, JSON_UNESCAPED_UNICODE);
        $header->iconsUrl = $iconsUrl;


        $pages = $request->input('pages');
        $pages = json_encode($pages, JSON_UNESCAPED_UNICODE);
        $header->pages = $pages;

        $pagesUrl = $request->input('pagesUrl');
        $pagesUrl = json_encode($pagesUrl, JSON_UNESCAPED_UNICODE);
        $header->pagesUrl = $pagesUrl;

        //header on index page
        $header->indexMessage = $request->input('indexMessage');
        $header->indexTitle = $request->input('indexTitle');
        $header->indexContent = $request->input('indexContent');
        $header->indexDiscountMessage = $request->input('indexDiscountMessage');
        $header->indexSearchName = $request->input('indexSearchName');

        //Header for other pages
        $header->opTitle = $request->input('opTitle');
        $header->opSmallTitle = $request->input('opSmallTitle');
        $header->opSmallTitleIcon = $request->input('opSmallTitleIcon');
        $header->opSmallTitleUrl = $request->input('opSmallTitleUrl');
        $header->opSmallTitle2 = $request->input('opSmallTitle2');

        $header->save();
        return redirect('dashboard/dynamic-edit/header')->with('store', "header eklendi");
    }

    function update(Request $request, $id)
    {
        $header = Header::find($id);
        if($request->hasFile('image'))
        {
            $path = 'admin/headerimage/'.$header->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move('admin/headerimage',$filename);
            $header->image = $filename;
        }

        if($request->hasFile('indexImage'))
        {
            $path = 'admin/headerimage/'.$header->indexImage;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('indexImage');
            $ext = $file->getClientOriginalExtension();
            $indexImagefilename = uniqid().'.'.$ext;
            $file->move('admin/headerimage',$indexImagefilename);
            $header->indexImage = $indexImagefilename;
        }

        if($request->hasFile('opImage'))
        {
            $path = 'admin/headerimage/'.$header->opImage;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('opImage');
            $ext = $file->getClientOriginalExtension();
            $opImagefilename = uniqid().'.'.$ext;
            $file->move('admin/headerimage',$opImagefilename);
            $header->opImage = $opImagefilename;
        }
        $header->imageUrl = $request->input('imageUrl');

        $infoRows = $request->input('infoRows');
        $infoRows = json_encode($infoRows, JSON_UNESCAPED_UNICODE);
        $header->infoRows = $infoRows;

        $infoRowsUrl = $request->input('infoRowsUrl');
        $infoRowsUrl = json_encode($infoRowsUrl, JSON_UNESCAPED_UNICODE);
        $header->infoRowsUrl = $infoRowsUrl;

        $infoRowsIcon = $request->input('infoRowsIcon');
        $infoRowsIcon = json_encode($infoRowsIcon, JSON_UNESCAPED_UNICODE);
        $header->infoRowsIcon = $infoRowsIcon;

        $icons = $request->input('icons');
        $icons = json_encode($icons, JSON_UNESCAPED_UNICODE);
        $header->icons = $icons;

        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl = json_encode($iconsUrl, JSON_UNESCAPED_UNICODE);
        $header->iconsUrl = $iconsUrl;

        $pages = $request->input('pages');
        $pages = json_encode($pages, JSON_UNESCAPED_UNICODE);
        $header->pages = $pages;

        $pagesUrl = $request->input('pagesUrl');
        $pagesUrl = json_encode($pagesUrl, JSON_UNESCAPED_UNICODE);
        $header->pagesUrl = $pagesUrl;

        //header on index page
        $header->indexMessage = $request->input('indexMessage');
        $header->indexTitle = $request->input('indexTitle');
        $header->indexContent = $request->input('indexContent');
        $header->indexDiscountMessage = $request->input('indexDiscountMessage');
        $header->indexSearchName = $request->input('indexSearchName');

        //Header for other pages
        $header->opTitle = $request->input('opTitle');
        $header->opSmallTitle = $request->input('opSmallTitle');
        $header->opSmallTitleIcon = $request->input('opSmallTitleIcon');
        $header->opSmallTitleUrl = $request->input('opSmallTitleUrl');
        $header->opSmallTitle2 = $request->input('opSmallTitle2');

        $header->save();
        return redirect('dashboard/dynamic-edit/header')->with('update', "header güncellendi");
    }

    function view()
    {
        $footer = Header::first();
        return $footer;
    }

}
