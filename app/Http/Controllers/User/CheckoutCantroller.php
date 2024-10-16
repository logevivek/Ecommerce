<?php

namespace App\Http\Controllers\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\Configuration\Php;
use Illuminate\Support\Facades\Session;

class CheckoutCantroller extends Controller
{
    public function StoreCheckoutData(Request $request )
    {

    // Insert Order Data In order Table
        $cart = session()->get('cart', []);
       //dd($cart);
        //Generrate Order Id
        $order_id='ORDER'.rand(10000,99999);

        foreach ($cart as  $cart_data) {
        //dd($cart);
        $product_id=$cart_data['product_id'];
        $product_price=$cart_data['product_price'] * $cart_data['quantity'];
        $product_qty=$cart_data['quantity'];
            $orders[] = [
                'order_id' =>$order_id,
                'pro_id'=>$product_id,
                'pro_price'=>$product_price,
                'pro_quantity'=>$product_qty,
            ];  
        }

        Order::insert($orders);

        foreach($orders as $orderData)
        {
           $productId= $orderData['pro_id'];
           $oldproqty=$orderData['pro_quantity'];
            $proIds[] = [
                'id'=>$productId,
                'pro_quantity'=>$oldproqty,
            ];

            $userProductId=$productId;
            $userProductQty=$oldproqty;

    
        // Get Number of Quantity In Products Table 
            $tableproquantity=Product::select('pro_quantity')
            ->where('id', '=', $userProductId)
            ->first();

            $tableProQty= $tableproquantity->pro_quantity;
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

        ]);

        // Generrate Customer Id
        $customer_id='CUST'.rand(10000,99999);
        OrderDetail::create([
            'order_id' =>$order_id,
            'customer_id' =>$customer_id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'email'=>$request->email,
            'state'=>$request->state,
            'address'=>$request->address,
            'city'=>$request->city,
            'pincode'=>$request->pincode,
            'pay_mode'=>$request->pay_mode,

        ]);

    // Remove All Session Here..
        Session::flush();
        return redirect('index')->with('success', 'Your order has been placed successfully!');

    }

}
