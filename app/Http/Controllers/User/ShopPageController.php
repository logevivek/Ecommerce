<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopPageController extends Controller
{

    public function ShowShopPage(Request $request) {
        $category_data = Category::get();
        $web_data = Website::get();
        $banner_data = Banner::get();
        
        // Fetch all products
        $query = Product::query();
        if ($request->has('min_price') && $request->has('max_price')) {
            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');
    
            if (is_numeric($min_price) && is_numeric($max_price)) {
                $query->whereBetween('pro_price', [$min_price, $max_price]);
            }
        }
    
        $pro_data = $query->get();
        $totalProducts = $pro_data->count();
    
        return view('front.shop', compact('category_data', 'pro_data', 'web_data', 'banner_data', 'totalProducts'));
    }
    

}
