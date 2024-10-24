<?php

namespace App\Http\Controllers\Admin;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function ShowPage(){
      
        $pages = Page::orderBy('id', 'desc')->get();
        $TotalPage=count($pages);
         return view('backend.page', compact('pages','TotalPage'));
    
    }

    public function createPage(){
        return view('/backend.addpage');
    }

    public function storepage(Request $request)
    {
        $jsonString=$request->tags;
        $array=json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);

        $request->validate([
            'title' => 'required|string|unique:pages|max:50',
            'heading' => 'required',
            'desc' => 'required',
            'meta_title'=> 'required|string|min:5|max:20',
            'meta_description'=>'required|string',
            'focus_keyword'=>'required|string',
            'tags'=>'required|unique:category',
            
        ],
        [
            'title.required'=>'Please enter page title name',
            'heading.required'=>'Please enter page heading',
            'desc.required'=>'Please enter page description',
            'meta_title.required'=>'Please enter meta title',
            'meta_description.required'=>'Please enter meta description',
            'focus_keyword.required'=>'Please enter focus keyword',
            'tags.required'=>'Please add tags name',  
        ]);

        Page::create([
            'title'=>$request->title,
            'heading'=>$request->heading,
            'desc'=>$request->desc,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'focus_keyword'=>$request->focus_keyword,
            'tags'=>$tags_data

        ]);
        return redirect('/page')->with('status', 'Page have been created successfully!');
       
    }

    public function changePageStatus(Request $request)
    {
        //dd($request);
        $page_status = Page::find($request->page_id);
        $page_status->status = $request->status;
        $page_status->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function editPage(Request $request){
        $id=$request->query('id');
        $page = DB::table('pages')->where('pages.id',$id)->first();
        return view('backend.editPage' , ['page' => $page]);
    }

    public function updatePage(Request $request){

        $id = $request->query('id');
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:100', 
            'heading' => 'required',
            'desc' => 'required',
            'meta_title'=> 'required|string|min:5|max:20',
            'meta_description'=>'required|string',
            'focus_keyword'=>'required|string',
            'tags'=>'required', 
        ]);

    //decode tags
        $jsonString = $request->tags;
        $array = json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);
        $input = $request->all();

        $data=Page::find($id);
        $data->update($input);
        // Update tags 
        $data->update(array_merge($input, ['tags' => $tags_data]));
        // Redirect with a success message
        return redirect('/page')->with('status', 'Page details have been updated successfully!');
       

    }
    



}
