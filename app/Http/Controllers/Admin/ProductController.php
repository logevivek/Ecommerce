<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function ShowProduct(){
    $product_data = DB::table('products')
    ->join('category', 'products.cat_id', '=', 'category.id')
    ->select('products.*', 'category.name')->orderBy('id', 'desc')
    ->where('products.trash',0)
    ->get();
    $totalProduct=count($product_data);
    return view('backend.product', compact('product_data','totalProduct'));
    }
 
    public function createProduct()
    {  
        $data = Category::get();
        //dd($data);
        return view('backend.addproduct', compact('data'));
    }

    public function storeProduct( Request $request){

        $jsonString=$request->tags;
        $array = json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);

        //dd($tags_data); 
       $request->validate([
        'pro_name' => 'required|regex:/([A-Za-z0-9 ])+/|string|unique:products|max:30',
        'pro_desc' => 'required',
        'pro_price' => 'required|integer|min:0.01|max:999999.99',
        'pro_quantity' => 'required|integer|min:1|max:100',
        'cat_id' => 'required|numeric',
        'pro_img' => 'required|mimes:jpeg,png,jpg|max:81920',
        'meta_title'=>'required|string|min:30|max:60',
        'meta_description'=>'required|string|min:100|max:160',
        'focus_keyword'=>'required|string',
        'tags'=>'required|unique:products',
    ],
    [
        'pro_name.required'=>'Please enter product name',
        'pro_desc.required'=>'Please enter product description',
        'pro_price.required' => 'The price field is required.',
        'pro_price.numeric' => 'The price must be a number.',
        'pro_price.min' => 'The price must be at least :min.',
        'pro_price.max' => 'The price may not be greater than :max.',
        'pro_quantity.required' =>'The quantity field is required.',
        'pro_quantity.integer' =>'The quantity must be an integer.',
        'pro_quantity.min' => 'The quantity must be at least :min.',
        'pro_quantity.max' => 'The quantity may not be greater than :max.',
        'cat_id.required'=>'Please select product category',
        'pro_img.required'=>'Please upload product image.',
        'meta_title.required'=>'Please enter meta title',
        'meta_description.required'=>'Please enter meta description',
        'focus_keyword.required'=>'Please enter focus keyword',
        'tags.required'=>'Please add tags name',  
    ]);

        //$input = $request->all();
        if ($image = $request->file('pro_img'))
        {
            $destinationPath = 'backend/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['pro_img'] = "$profileImage";
            $product_image = $input['pro_img'] ;

        }
        // Generrate Unique Product Id
        $pro_id='PRODUCT'.rand(10000,99999);

        Product::create([
            'pro_name'=> $request->pro_name,
            'pro_desc'=> $request->pro_desc,
            'pro_id' =>$pro_id,
            'pro_price'=>$request->pro_price,
            'pro_quantity'=>$request->pro_quantity,
            'cat_id'=>$request->cat_id,
            'pro_img'=>$product_image,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'focus_keyword'=>$request->focus_keyword,
            'tags'=>$tags_data,
            
        ]);
        return redirect('/product')->with('status', 'Product details have been created successfully!');
    }
    public function changeProStatus(Request $request)
    {
        //dd($request);
        $pro_status = Product::find($request->product_id);
        $pro_status->status = $request->status;
        $pro_status->save();
  
        return response()->json(['success'=>'Product status change successfully.']);
    }

    // Edit Product Details
    public function editProduct(Request $request)
    {
        $data = DB::table('category')->get();
        $id=$request->query('id');
        $product = DB::table('products')
        ->join('category', 'products.cat_id', '=', 'category.id')
        ->select('products.*', 'category.name')->where('products.id',$id)
        ->first();
        return view('backend.editProduct' , ['product' => $product], compact('data'));
     }
    

  // Update Product Details
  public function updateProduct(Request $request)
  {
      $id = $request->query('id');
      // Validate the request data
      $request->validate([
        'meta_title'=>'required|string|min:30|max:60',
        'meta_description'=>'required|string|min:100|max:160',
        'focus_keyword'=>'required|string',
        'tags'=>'required|unique:products',
    ],
    [
        'meta_title.required'=>'Please enter meta title',
        'meta_description.required'=>'Please enter meta description',
        'focus_keyword.required'=>'Please enter focus keyword',
        'tags.required'=>'Please add tags name',  
    ]);

        // Decode tags
        $jsonString = $request->tags;
        $array = json_decode($jsonString, true);
        $tags_values = array_column($array, 'value');
        $tags_data = implode(", ", $tags_values);

      $input = $request->all();
      //image upload
      if ($image = $request->file('pro_img')) 
      {
          $destinationPath = 'backend/images/';
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $profileImage);
          $input['pro_img'] = "$profileImage";    
      }
      
      $data=Product::find($id);
      $data->update($input);
      $data->update(array_merge($input, ['tags' => $tags_data]));
      // Redirect with a success message
      return redirect('/product')->with('status', 'Product details have been updated successfully!');
  }
  

   // Delete Product Details//
   public function deleteproduct(Request $request){
    $id=$request->query('id');
    $data=Product::find($id);
    if ($data) 
    {
        $pro_imgPath = 'backend/images/'.$data->pro_img;
        // Delete the image file if it exists
        if (file_exists($pro_imgPath)) 
        {
            unlink($pro_imgPath);
        }

    }
    $data->trash = 1;
    $data->update();
   return redirect('/product')->with('status','Product details have been deleted successfully!!');

   }

}

