<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function ShowOrder()
    {
        // $order = Order::orderBy('id', 'desc')->get();
        $order = DB::table('orders')
        ->join('order_details', 'orders.order_id','=','order_details.order_id')
        ->select('order_details.*','orders.*')
        ->get();
        //dd($order);
        $TotalOrder=count($order);
        return view('/backend.order', compact('order','TotalOrder'));
    }


    public function ViewOrder(Request $request)

    {
            $order_id=$request->query('order_id');
            //dd($order_id);
            $order_data = DB::table('order_details')
            ->leftJoin('orders', 'order_details.order_id' ,'=','orders.order_id')
            ->leftJoin('products', 'orders.pro_id', '=', 'products.id')
            ->select('orders.*','order_details.*','products.pro_name','products.pro_img','products.pro_price')
            ->where('orders.order_id',$order_id)
            ->get();
       //dd($order_data);
        return view('backend.Vieworder' , ['order_data' => $order_data]);

        }

    
    // order Update function
    public function updateOrderStatus(Request $request)
        {
            // Validate the request
            $request->validate([
                'id' => 'required|exists:orders,id',
                'status' => 'required|integer|min:0|max:3',
            ]);
        
            // Find the order and update its status
            $order = Order::find($request->id);
            $order->status = $request->status;
            $order->save();

            return response()->json(['message' => 'Order status updated successfully!']);
        }


    }
