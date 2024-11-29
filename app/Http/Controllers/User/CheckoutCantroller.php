<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutCantroller extends Controller
{
    // Apply Coupon Code Function
    public function applyCouponCode(Request $request)

    {
        // Initialize variables
        $discount_value = 0;
        $lessdiscountGrandTotal = 0;

        // Check coupon_name is avilable is coupon table
        $result = CouponCode::where(['coupon_name' => $request->coupon_name])->first();
        //dd($result);
      
        if ($result != null) {
            if ($result->status == 0) {
                $coupon_name = $result->coupon_name;
                $coupon_discount = $result->discount;
                $coupon_limit = $result->coupon_limit;

            // Check Coupon attempt limit here, 0 means user use coupon unlimited time
            if ( $result->coupon_attempt == 0 || $result->coupon_attempt > $coupon_limit ) 
            {
                    // 1 increment coupon_limit value in coupon_codes table  
                     CouponCode::where('coupon_name', '=', $coupon_name)->increment('coupon_limit', 1);

                    if(session('cart')){
                        $carts_data = session()->get('cart', []);
                        $total_cardvalue = 0;
                        foreach($carts_data as  $carts_value)
                         $total_cardvalue += $carts_value['product_price'] * (float)$carts_value['quantity'];
                        // Discount Amount code
                        $discount_value= ($coupon_discount/100) * $total_cardvalue;
                        // Less Discount Amount From Total Amount
                        $lessdiscountGrandTotal=$total_cardvalue-$discount_value;
                
                       //dd($lessdiscountGrandTotal);
                    }

                        $status = "success";
                        $msg = "Coupon code has been applied";
                    }

                    else 
                    {
                        $status = "error";
                        $msg = "Coupon code limit has been exceed";
                    }
                } 
                else 
                {
                    $status = "error";
                    $msg = "Coupon code has been expired";
                }
                } 
                else 
                {
                    $status = "error";
                    $msg = "Enter valid coupon code";
                }
       
            return response()->json([
                    'status' => $status, 
                    'msg' => $msg,
                    'discount_value'=> $discount_value,
                    'lessdiscountGrandTotal'=> $lessdiscountGrandTotal,
            ]);
    }


        //Remove Coupon Code Function 
            public function RemoveCouponCode(Request $request){
            
                $result = CouponCode::where(['coupon_name' => $request->coupon_name])->first();
                $coupon_name = $result->coupon_name;

                // 1 decrement coupon_limit value in coupon_codes table when user remove code// 
                CouponCode::where('coupon_name', '=', $coupon_name)->decrement('coupon_limit', 1);

                if(session('cart'))
                {
                    $carts_data = session()->get('cart', []);
                    $total_cardvalue = 0;
                    foreach($carts_data as  $carts_value)
                    $total_cardvalue += $carts_value['product_price'] * (float)$carts_value['quantity'];
                    //dd($total_cardvalue);

                }

                    $status = "success";
                    $msg = "Coupon has been removed";

                    return response()->json([
                    'status' => $status, 
                    'msg' => $msg,
                    'total_cardvalue'=> $total_cardvalue,
                        
                ]);

            }

    public function StoreCheckoutData(Request $request)

    {
        // Insert Order Data In order Table
        $cart = session()->get('cart', []);
        //dd($cart);
        //Generrate Order Id
        $order_id = 'ORDER' . rand(10000, 99999);

        foreach ($cart as  $cart_data) {
            //dd($cart);
            $product_id = $cart_data['product_id'];
            $product_price = $cart_data['product_price'] * $cart_data['quantity'];
            $product_qty = $cart_data['quantity'];
            $orders[] = [
                'order_id' => $order_id,
                'pro_id' => $product_id,
                'pro_price' => $product_price,
                'pro_quantity' => $product_qty,
            ];
        }

        Order::insert($orders);

        foreach ($orders as $orderData) {
            $productId = $orderData['pro_id'];
            $oldproqty = $orderData['pro_quantity'];
            $proIds[] = [
                'id' => $productId,
                'pro_quantity' => $oldproqty,
            ];
            $userProductId = $productId;
            $userProductQty = $oldproqty;

            // Get Number of Quantity In Products Table 
            $tableproquantity = Product::select('pro_quantity')->where('id', '=', $userProductId)->first();
            $tableProQty = $tableproquantity->pro_quantity;
            $RemainingQty = $tableProQty - $userProductQty;

            //Update Product Quantity in products table
            Product::where('id', '=', $userProductId)
                ->update(['pro_quantity' => $RemainingQty]);
        }


        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'pay_mode' => 'required',
        // Add new Column data 
            'total_amount' => 'required',
            'coupon_discount' => 'required',
            'grand_total' => 'required',

        ]);

        // Generrate Customer Id
        $customer_id = 'CUST' . rand(10000, 99999);
        OrderDetail::create([
            'order_id' => $order_id,
            'customer_id' => $customer_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'email' => $request->email,
            'state' => $request->state,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'pay_mode' => $request->pay_mode,
        // Add new Column data
            'total_amount' => $request->total_amount,
            'coupon_discount' => $request->coupon_discount,
            'grand_total' => $request->grand_total,

        ]);

        // Remove All Session Here..
        Session::flush();
        return redirect('index')->with('success', 'Your order has been placed successfully!');
    }
}
