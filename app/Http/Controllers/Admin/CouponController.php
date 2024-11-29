<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CouponCode;
use Illuminate\Http\Request;

class CouponController extends Controller

{
    
    public function ShowCoupons()
    {
        $coupons_data= CouponCode::orderBy('id', 'desc')->where('trash',0)->get();
        $TotalCoupons = count($coupons_data);
        return view('/backend.coupons', compact('coupons_data','TotalCoupons'));
    }

    public function createCoupons()
    {
        return view('/backend.addcoupons');
    }

    public function storeCoupons(Request $request){
        //dd($request);
        $request->validate([
            'coupon_name' => 'required|string|unique:coupon_codes|max:20',
            'discount' => 'required',
        
        ],
        [
            'coupon_name.required'=>'Please enter coupon code name',
            'discount.required'=>'Please enter coupon discount',
        ]);

        CouponCode::create([
            'coupon_name'=> $request->coupon_name,
            'discount'=> $request->discount,
            'coupon_attempt'=> $request->coupon_attempt,
        
        ]);
        return redirect('/coupons')->with('status', 'Coupons details have been created successfully!');

    }


        public function editCoupons(Request $request){

            $id=$request->query('id');
            //dd($id);
            $coupons = CouponCode::orderBy('id', 'desc')->where('coupon_codes.id',$id)->first();
            return view('backend.editCoupons', compact('coupons'));
        }


        // Update Discount Coupon Code function
        public function updateCoupons( Request $request){

            $id = $request->query('id');
                // Validate the request data
                $request->validate([
                    'coupon_name' => 'required|string|max:20',
                    'discount' => 'required',
                
                ]);

                $input = $request->all();
                $data=CouponCode::find($id);
                $data->update($input);
                // Redirect with a success message
                return redirect('/coupons')->with('status', 'Coupons details have been updated successfully!');

        }

   // Coupon status change function 
    public function changeCoupanStatus(Request $request)
    {
        //dd($request);
        $coupon_status = CouponCode::find($request->coupon_id);
        $coupon_status->status = $request->status;
        $coupon_status->save();
        return response()->json(['success'=>'Status has been change successfully.']);
    }


  // Delete coupon function
    public function deleteCoupons(Request $request){
        $id=$request->query('id');
        $data=CouponCode::find($id);
        $data->trash = 1;
        $data->update();
        return redirect('/coupons')->with('status','Coupons details have been deleted successfully!!');

    }

}
