<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function ShowWebsiteData(){
        $web_data = Website::orderBy('id', 'desc')->get();
        $totalWebData=count($web_data);
        return view('/backend.website', compact('web_data','totalWebData'));
    }

    
    public function createWebsite()
    {
       return view('/backend.addWebsite');
    }

    public function storeWebsite(Request $request)

    {
        //dd($request); 
        $request->validate([
            'web_address' => 'required',
            'web_mobile' => 'required|min:11|numeric',
            'web_email' => 'required|email',
            'web_logo' => 'required|mimes:jpeg,png,jpg|max:81920',
        ],
        [
            'web_address.required'=>'Please enter website address',
            'web_mobile.required'=>'Please enter mobile',
            'web_email.required'=>'Please enter email address',
            'web_logo.required'=>'Please upload website logo',  
        ]);


        $input = $request->all();
        if ($image = $request->file('web_logo'))
         {
            $destinationPath = 'backend/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['web_logo'] = "$profileImage";
        }
        
        Website::create($input);
        return redirect('/website')->with('status', 'Website details have been created successfully!');
       
    }


    public function editWebsite(Request $request){
        //dd($id);
        $id=$request->query('id');
        $website = DB::table('websites')->where('websites.id',$id)->first();
        return view('backend.editwebsite' , ['website' => $website]);
    }


    public function updateWebsite(Request $request){
        
        $id = $request->query('id');
            // Validate the request data
            $request->validate([
                'web_address' => 'required', 
            ]);

            $input = $request->all();
            //image upload
            if ($image = $request->file('web_logo')) 
            {
                $destinationPath = 'backend/images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['web_logo'] = "$profileImage";    
            }
            
            $data=Website::find($id);
            $data->update($input);
            // Redirect with a success message
            return redirect('/website')->with('status', 'Website details have been updated successfully.!!');
    }


}
