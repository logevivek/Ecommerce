<?php
namespace App\Http\Controllers\User;
use App\Models\Page;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function ShowHomePage(){
    $cat_data = Category::get();
    $pro_data = Product::get();
    $web_data=Website::get();
    $banner_data=Banner::get();
    // dd($cat_data);
    return view('front.home' , compact('cat_data','pro_data','web_data','banner_data'));

    }


    public function ProductDetailsPage($id){
        $single_product=Product::where('id', $id)->first();
        $cat_id=$single_product->cat_id;
        $related_product=Product::where('cat_id',$cat_id)->where('id', '!=', $cat_id)->get();
        $category_data = Category::get();
        $review_data=ProductReview::get();
        $totalReview=count($review_data);
        //dd($review_data);
        $web_data=Website::get();
        return view('front.prodetails' , compact('category_data','web_data','single_product','related_product','review_data','totalReview'));
    }

    // Product Review Function 

    public function StoreProReview(Request $request){

    //dd($request);
        $Proid=$request->id;
         $request->validate([
           'coustomer_name' => 'required',
           'email'=>'required',
           'review'=>'required',
         ]);

         ProductReview::create([
            'product_id'=>$Proid,
            'star_rating'=>$request->star_rating,
            'coustomer_name'=>$request->coustomer_name,
            'email'=>$request->email,
            'review'=>$request->review,
        ]);
        return redirect('index')->with('success','Your product review has been send successfully !');
        
    }

        public function cart()
        {
            $banner_data=Banner::get();
            $pro_data = Product::get();
            $category_data = Category::get();
            $web_data=Website::get();
            return view('front.cart' ,compact('category_data','pro_data','web_data','banner_data'));
        }


        public function addToCart($id)
        { 
            $product=Product::findOrFail($id);
            $productQuantity=$product->pro_quantity;
            //dd($productQuantity);
            $cart = session()->get('cart', []);
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "tbl_qty"=>$productQuantity,
                    "product_id" => $product->id,
                    "product_name" => $product->pro_name,
                    "quantity" => 1,
                    "product_price" => $product->pro_price,
                    "product_image" => $product->pro_img
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            // $card_data=session::get('cart');
            // dd($card_data);
        }  

    // Update Product quantity in cart
    public function update(Request $request)
        {
            //dd($request);
            if($request->id && $request->quantity){
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Product quantity updated successfully');
            }
        }

        public function remove(Request $request)
        {
            if($request->id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Product removed from cart successfully');
            }
        }

        public function ShowCategoryPage($id){
            //dd($id);
            $web_data=Website::get();
            $banner_data=Banner::get();
            $category_data = Category::get();
            $cat_base_product=Product::where('cat_id',$id)
            ->leftJoin('category', 'products.cat_id', '=', 'category.id')
            ->select('products.*', 'category.*')
            ->get();
           //dd($cat_base_product['0']['name']);
            return view('front.showcategory', compact('web_data','category_data','cat_base_product','banner_data'));
        }

        Public function ContactPage(){

            $web_data=Website::get();
            $category_data = Category::get();
            return view('front.contactpage',compact('web_data','category_data'));

        }

     public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            Contact::create($request->all());
            return redirect()->back()
            ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
        }



        public function AboutPage(){
            $web_data=Website::get();
            $category_data = Category::get();
            $about_data=Page::where('title','About Us')->get();
            return view('front.aboutpage',compact('web_data','category_data','about_data'));
    
        }

        public function PrivacyPage(){
            $web_data=Website::get();
            $category_data = Category::get();
            $privacy_data=Page::where('title','Privacy Policy')->get();
            return view('front.privacypage', compact('web_data','category_data','privacy_data'));
        }

        public function TermPage(){
            $web_data=Website::get();
            $category_data = Category::get();
            $term_data=Page::where('title','Terms & Conditions')->get();
            return view('front.termpage',compact('web_data','category_data','term_data'));
        }


        public function ProductListAjax()
        {
            $products=Product::select('pro_name')->where('status','0')->get();
            $data=[];
            foreach($products as $items)
            {
                $data[]=$items['pro_name'];
            }
            return $data;
        }

        public function SearchProducts(Request $req)
        {
            //return $req;
            $search_product=$req->product_name;
            
            if($search_product != "")
            {
                $category_data = Category::get();
                $web_data=Website::get();
                $products=Product::where("pro_name","LIKE","%$search_product%")->get();
                //dd($products);
                if($products)
                {
                    return view('front.searchproduct', compact('category_data','products','web_data'));
                }
                else
                {
                    return redirect()->back()->with('success', 'No product matched your search !');
                }
                

            }
            else
            {
                return redirect()->back();
            }

        }


        public function ShowCheckoutPage()
        {
            $web_data=Website::get();
            $category_data = Category::get();
            $carts_data = session()->get('cart', []);
            //dd($cart);
            return view('front.checkoutpage', compact('web_data','category_data','carts_data'));
        }

}
