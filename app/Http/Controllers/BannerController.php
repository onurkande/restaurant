<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public $tutulanid;
    function index()
    {
        dd($this->tutulanid);
        $records = Banner::find($this->tutulanid);
        return view('admin.banner',['records'=>$records]);
    }
    
    function store(Request $request)
    {
        $banner = new Banner;
        $imagePaths = [];

        // İlgili form alanından resim dosyalarını alın
        $images = $request->file('image');
        // dd($images);

        // Her bir resim dosyası için işlem yapın
        foreach($images as $image) 
        {
            $filename = $image->getClientOriginalName();
            $image->move('admin/bannerimage', $filename);
            $imagePath = $filename;
            $imagePaths[] = $imagePath;
        }

        $imagesJson = json_encode($imagePaths, JSON_UNESCAPED_UNICODE);
        $banner->image = $imagesJson;

        $urls = $request->input('url');
        $urlsJson = json_encode($urls, JSON_UNESCAPED_UNICODE);
        $banner->url = $urlsJson;
    
        $banner->title = $request->input('title');
        $banner->message = $request->input('message');
        
        $banner->save();
        return redirect('dashboard/dynamic-edit/banner')->with('store', "Banner eklendi");
    }

    function update(Request $request, $id)
    {
        $this->tutulanid = $id;
        // $this->index($tutulanid);
        // $this->deleteImage($tutulanid);

        $banner = Banner::find($id);
        $imagePaths = [];
    
        // İlgili form alanından resim dosyalarını alın
        $images = $request->file('image');
    
        // Her bir resim dosyası için işlem yapın
        foreach ($images as $image) 
        {
            $filename = $image->getClientOriginalName();
            $image->move('admin/bannerimage', $filename);
            $imagePath = $filename;
            $imagePaths[] = $imagePath;
        }

        $oldImage = $request->input('oldImage');
        if($oldImage)
        {
            $AllImage = array_merge($oldImage, $imagePaths);
            // dd($AllImage);
            $AllImage = json_encode($AllImage, JSON_UNESCAPED_UNICODE);
            $banner->image = $AllImage;
        }else
        {
            $imagesJson = json_encode($imagePaths, JSON_UNESCAPED_UNICODE);
            $banner->image = $imagesJson;
        }
    
    
        $urls = $request->input('url');
        $urlsJson = json_encode($urls, JSON_UNESCAPED_UNICODE);
        $banner->url = $urlsJson;
    
        $banner->title = $request->input('title');
        $banner->message = $request->input('message');
    
        $banner->save();
        return redirect('dashboard/dynamic-edit/banner')->with('update', "Banner güncellendi");
    }
    

    function deleteImage($image,$tutulanid)
    {
        dd($tutulanid);
        $banner =Banner::find(1);
        $images = $banner->image;
        $images = json_decode($images, TRUE);
        $index = array_search($image, $images); // Resmi bulmak için array_search kullanın
        if ($index !== false)
        {
            unset($images[$index]); // Resmi diziden kaldırın
            $banner->image = json_encode(array_values($images), JSON_UNESCAPED_UNICODE);
            $banner->save();
        }

        $path = 'admin/bannerimage/'.$image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        return redirect('dashboard/dynamic-edit/banner')->with('deleteImage',"Image silindi");
    }
}
