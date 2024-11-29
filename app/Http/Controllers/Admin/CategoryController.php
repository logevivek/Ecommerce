<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ProductCategory(){
        $categories = Category::orderBy('id', 'desc')->where('trash',0)->get();
        $TotalCategory = count($categories);
        return view('/backend.category', compact('categories','TotalCategory'));
    }

    public function createCategory()
    {
        $data = Category::get();
        return view('/backend.addcategory', compact('data'));
    }

    public function storeCategory(Request $request)

    {
    // Decode tags data
     if( $jsonString=$request->tags){
        $array = json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);
        }
        $request->validate([
            'name' => 'required|string|unique:category|max:100',
            'description'=> 'required',
            'cat_img'=> 'required|mimes:jpeg,png,jpg|max:81920',
            'meta_title'=>'required|string|min:5|max:60',
            'meta_description'=>'required|string|min:100|max:160',
            'focus_keyword'=>'required|string',
            'tags'=>'required',

        ],
        [
            'name.required'=>'Please enter category name',
            'description.required'=>'Please enter description',
            'cat_img.required'=>'Please upload category image.',
            'meta_title.required'=>'Please enter meta title',
            'meta_description.required'=>'Please enter meta description',
            'focus_keyword.required'=>'Please enter focus keyword',
            'tags.required'=>'Please add tags name',  
        ]);
        if ($image = $request->file('cat_img'))
         {
            $destinationPath = 'backend/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cat_img'] = "$profileImage";
            $category_image = $input['cat_img'] ;
        }

        Category::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'cat_img' =>$category_image,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'focus_keyword'=>$request->focus_keyword,
            'tags'=>$tags_data,
        ]);

        return redirect('/category')->with('status', 'Product category have been created successfully!');
       
    }

        public function changeStatus(Request $request)
        {
            //dd($request);
            $cat_status = Category::find($request->category_id);
            $cat_status->status = $request->status;
            $cat_status->save();
    
            return response()->json(['success'=>'Status change successfully.']);
        }


        // Edit Category Details
        public function editCategory($id)
        {
            $category = DB::table('category')->where('category.id',$id) ->first();
            return view('backend.editcategory' , ['category' => $category]);
         }


        public function updateCategory(Request $request)
        {
            $id = $request->id;
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'required',
                'meta_title' => 'required|string|min:5|max:60',
                'meta_description' => 'required|string|min:100|max:160',
                'focus_keyword' => 'required|string',
                'tags' => 'required',
            ],
            [
                'name.required' => 'Please enter category name',
                'description.required' => 'Please enter description',
                'meta_title.required' => 'Please enter meta title',
                'meta_description.required' => 'Please enter meta description',
                'focus_keyword.required' => 'Please enter focus keyword',
                'tags.required' => 'Please add tags name',
            ]);

            // Decode tags
            $jsonString = $request->tags;
            $array = json_decode($jsonString, true);
            $tags_values = array_column($array, 'value');
            $tags_data = implode(", ", $tags_values);

            $input = $request->all();
            
            // Image upload
            if ($image = $request->file('cat_img')) {
                $destinationPath = 'backend/images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['cat_img'] = "$profileImage";
            }
            
            // Update category
            $data = Category::find($id);
            $data->update($input);
            $data->update(array_merge($input, ['tags' => $tags_data]));

            // Redirect with a success message
            return redirect('/category')->with('status', 'Product category details have been updated successfully.');
        }
            
        // Delete Category Details//
           public function deleteCategory(Request $request){
            $id=$request->query('id');
            $data=Category::find($id);
            if ($data) 
            {
                $cat_imgPath = 'backend/images/'.$data->cat_img;
                // Delete the image file from images folder also if it exists
                if (file_exists($cat_imgPath)) 
                {
                    unlink($cat_imgPath);
                }
            }
            $data->trash = 1;
            $data->update();
           return redirect('/category')->with('status','Product category details have been deleted successfully!!');
   
           }
}
