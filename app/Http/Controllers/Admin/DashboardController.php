<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function Dashboard(){
        $totalCategory=Category::where('trash', '=', 0)->count();
        $totalProduct=Product::where('trash', '=', 0)->count();
        $totalPage=Page::where('trash', '=', 0)->count();
        $totalUser=User::where('is_admin', '=', 0)->count();
        $totalOrder=Order::where('trash', '=', 0)->count();
        return view('backend.dashboard' , compact('totalCategory','totalProduct','totalPage','totalUser','totalOrder'));
    }
    

}
