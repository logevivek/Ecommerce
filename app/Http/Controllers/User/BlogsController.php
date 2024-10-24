<?php

namespace App\Http\Controllers\User;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Website;
use App\Models\Category;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{

    public function BlogsPage() {
        $category_data = Category::get();
        $web_data=Website::get();
        $blogs_data = Blog::orderBy('id','desc')->simplePaginate(4);
        $meta_data=Page::where('meta_title','Blog Page')->first();
        return view('front.blogs', compact('category_data' ,'web_data','blogs_data','meta_data'));
        
    }


    // Blog Details Page
    public function BlogDetailsPage($id){
        $category_data = Category::get();
        $web_data=Website::get();
        $blogs_data=Blog::get()->take(3);
        $single_blogdata=Blog::where('id', $id)->first();
        $meta_data=Blog::where('id', $id)
        ->first();
        return view('front.blogdetails' , compact('category_data','web_data','single_blogdata','blogs_data','meta_data'));
    }
    

}
