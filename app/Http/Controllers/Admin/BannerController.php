<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function ShowBanner(){
        $banner_data = Banner::orderBy('id', 'desc')->get();
        //dd($banner_data);
        $totalBanner=count($banner_data);
        return view('/backend.banner' , compact('banner_data','totalBanner'));
    }

    public function createBanner()
    {
        return view('/backend.addbanner');
    }


    public function storeBlogs(Request $request)

    {
        //dd($request); 
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'blog_desc' => 'required',
            'blog_banner' => 'required|mimes:jpeg,png,jpg|max:5120',
        ],
        [
            'title.required'=>'Please enter banner title name',
            'banner_img.required'=>'Please upload banner image.',  
        ]);


        $input = $request->all();
        if ($image = $request->file('blog_banner'))
         {
            $destinationPath = 'backend/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['blog_banner'] = "$profileImage";
        }
        
        Banner::create($input);
        return redirect('/banner')->with('status', 'Banner image have been uploaded successfully!');
       
    }

    public function editBanner(Request $request){
        //dd($request);
        $id=$request->query('id');
        $banner = DB::table('banners')
        ->where('banners.id',$id)
        ->first();
        return view('backend.editbanner' , ['banner' => $banner]);
    }

        // Update Category Details
        public function updateBanner(Request $request)
        {
            $id = $request->query('id');
            // Validate the request data
            $request->validate([
                'title' => 'required|string|max:50',  
            ]);

            $input = $request->all();
            //image upload
            if ($image = $request->file('banner_img')) 
            {
                $destinationPath = 'backend/images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['banner_img'] = "$profileImage";    
            }
            
            $data=Banner::find($id);
            $data->update($input);
            // Redirect with a success message
            return redirect('/banner')->with('status', 'Banner image have been updated successfully.!!');
        }


}
