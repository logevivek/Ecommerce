<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function ShowProReview(){

        $review = ProductReview::orderBy('id', 'desc')
        ->join('products', 'product_reviews.product_id' ,'=','products.id')
        ->select('product_reviews.*','products.pro_name')
        ->where('products.trash', 0)
         ->get();
        $TotalReview=count($review);
        return view('backend.showproreview' , compact('review','TotalReview'));
    }

    public function changeReviewstatus(Request $request)
    {
        //dd($request);
        $review_status = ProductReview::find($request->review_id);
        $review_status->status = $request->status;
        $review_status->save();
        return response()->json(['success'=>'Status has been change successfully.']);
    }

}
