<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    function index()
    {
        $records = Footer::first();
        return view('admin.footer',['records'=>$records]);
    }

    function store(Request $request)
    {
        $footer = new Footer;

        $icons = $request->input('icons');
        $icons = json_encode($icons, JSON_UNESCAPED_UNICODE);

        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl = json_encode($iconsUrl, JSON_UNESCAPED_UNICODE);


        $Shrows = $request->input('Shrows');
        $Shrows = json_encode($Shrows, JSON_UNESCAPED_UNICODE);

        $ShRowsUrl = $request->input('ShRowsUrl');
        $ShRowsUrl = json_encode($ShRowsUrl, JSON_UNESCAPED_UNICODE);

        $HlRows = $request->input('HlRows');
        $HlRows = json_encode($HlRows, JSON_UNESCAPED_UNICODE);

        $HlRowsUrl = $request->input('HlRowsUrl');
        $HlRowsUrl = json_encode($HlRowsUrl, JSON_UNESCAPED_UNICODE);

        $CuRows = $request->input('CuRows');
        $CuRows = json_encode($CuRows, JSON_UNESCAPED_UNICODE);

        $CuIcons = $request->input('CuIcons');
        $CuIcons = json_encode($CuIcons, JSON_UNESCAPED_UNICODE);
        
        $footer->content = $request->input('content');
        
        $footer->icons = $icons;
        $footer->iconsUrl = $iconsUrl;

        $footer->ShTitle = $request->input('ShTitle');
        $footer->Shrows = $Shrows;
        $footer->ShRowsUrl = $ShRowsUrl;
        $footer->HlTitle = $request->input('HlTitle');
        $footer->HlRows = $HlRows;
        $footer->HlRowsUrl = $HlRowsUrl;
        $footer->CuTitle = $request->input('CuTitle');
        $footer->CuRows = $CuRows;
        $footer->CuIcons = $CuIcons;

        $footer->bottom = $request->input('bottom');

        $footer->save();
        return redirect('dashboard/dynamic-edit/footer')->with('store', "footer eklendi");
    }

    function update(Request $request, $id)
    {
        $footer = Footer::find($id);
    
        $icons = $request->input('icons');
        $icons = json_encode($icons, JSON_UNESCAPED_UNICODE);
    
        $iconsUrl = $request->input('iconsUrl');
        $iconsUrl = json_encode($iconsUrl, JSON_UNESCAPED_UNICODE);
    
        $Shrows = $request->input('Shrows');
        $Shrows = json_encode($Shrows, JSON_UNESCAPED_UNICODE);
    
        $ShRowsUrl = $request->input('ShRowsUrl');
        $ShRowsUrl = json_encode($ShRowsUrl, JSON_UNESCAPED_UNICODE);
    
        $HlRows = $request->input('HlRows');
        $HlRows = json_encode($HlRows, JSON_UNESCAPED_UNICODE);
    
        $HlRowsUrl = $request->input('HlRowsUrl');
        $HlRowsUrl = json_encode($HlRowsUrl, JSON_UNESCAPED_UNICODE);
    
        $CuRows = $request->input('CuRows');
        $CuRows = json_encode($CuRows, JSON_UNESCAPED_UNICODE);
    
        $CuIcons = $request->input('CuIcons');
        $CuIcons = json_encode($CuIcons, JSON_UNESCAPED_UNICODE);
    
        $footer->content = $request->input('content');
    
        $footer->icons = $icons;
        $footer->iconsUrl = $iconsUrl;
    
        $footer->ShTitle = $request->input('ShTitle');
        $footer->Shrows = $Shrows;
        $footer->ShRowsUrl = $ShRowsUrl;
        $footer->HlTitle = $request->input('HlTitle');
        $footer->HlRows = $HlRows;
        $footer->HlRowsUrl = $HlRowsUrl;
        $footer->CuTitle = $request->input('CuTitle');
        $footer->CuRows = $CuRows;
        $footer->CuIcons = $CuIcons;
    
        $footer->bottom = $request->input('bottom');
    
        $footer->save();
        return redirect('dashboard/dynamic-edit/footer')->with('update', "footer güncellendi");
    }
    
    function view()
    {
        $footer = Footer::first();
        return $footer;
    }

}
