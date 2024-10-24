<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function ShowBlogs(){
        // vbsdmbhfsj
        $blogs_data= Blog::orderBy('id', 'desc')
        ->where('trash',0)
        ->get();
        $TotalBlogs = count($blogs_data);
        return view('/backend.blogs', compact('blogs_data','TotalBlogs'));

    }

    public function createBlogs(){

        return view('/backend.addblogs');
    }

    public function storeBlogs(Request $request)

    {

        $jsonString=$request->tags;
        $array = json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);

       // dd($request); 
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'blog_desc' => 'required',
            'blog_banner' => 'required|mimes:jpeg,png,jpg|max:5120',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'tags'=>'required',
        ],
        [
            'title.required'=>'Please enter title name',
            'heading.required'=>'Please enter heading name',
            'blog_desc.required'=>'Please enter blog description',
            'blog_banner.required'=>'Please upload blog image.',  
            'meta_title.required'=>'Please enter meta title',
            'meta_description.required'=>'Please enter meta description',
            'tags.required'=>'Please add tags name', 
        ]);

        if ($image = $request->file('blog_banner'))
         {
            $destinationPath = 'backend/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['blog_banner'] = "$profileImage";
            $blog_image = $input['blog_banner'] ;
        }

        Blog::create([
            'title'=> $request->title,
            'heading'=> $request->heading,
            'blog_desc'=>$request->blog_desc,
            'blog_banner'=>$blog_image,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'focus_keyword'=>$request->focus_keyword,
            'tags'=>$tags_data,
            
        ]);
    
        return redirect('/blogs')->with('status', 'Blog have been uploaded successfully!');
       
    }


 
    public function editBlogs(Request $request){
        //dd($request);
        $id=$request->query('id');
        $blogs = DB::table('blogs')
        ->where('blogs.id',$id)
        ->first();

        return view('backend.editblogs' , compact('blogs'));
    }

    // Update Blog Details
     public function updateBlogs(Request $request)
     {
         $id = $request->query('id');
         // Validate the request data
         $request->validate([
             'title' => 'required|string|max:50',  
         ]);

         $jsonString=$request->tags;
         $array = json_decode($jsonString, true);
         $tags_values = array_column($array, 'value');
         $tags_data = implode(", ", $tags_values);

         $input = $request->all();
         //image upload
         if ($image = $request->file('blog_banner')) 
         {
             $destinationPath = 'backend/images/';
             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
             $image->move($destinationPath, $profileImage);
             $input['blog_banner'] = "$profileImage"; 
            
         }
         
         $data=Blog::find($id);
         $data->update($input);
         $data->update(array_merge($input, ['tags' => $tags_data]));
         // Redirect with a success message
         return redirect('/blogs')->with('status', 'Blogs details have been updated successfully.!!');
     }



     // Delete Blog Records
     public function deleteBlogs(Request $request){
            $id=$request->query('id');
            $data=Blog::find($id);
            if ($data) 
            {
                $blog_imgPath = 'backend/images/'.$data->blog_banner;
                // Delete the image file if it exists
                if (file_exists($blog_imgPath)) 
                {
                    unlink($blog_imgPath);
                }
        
            }
            $data->trash = 1;
            $data->update();
            return redirect('/blogs')->with('status','Blogs details have been deleted successfully!!');

     }


}
