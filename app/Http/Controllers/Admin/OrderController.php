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

        $order = Order::orderBy('id', 'desc')->get();
        $TotalOrder=count($order);
        return view('/backend.order', compact('order','TotalOrder'));
    }

    public function ViewOrder(Request $request)

        {
            $id=$request->query('id');
            $order_data = DB::table('orders')
            ->join('order_details', 'orders.order_id' ,'=','order_details.order_id')
            ->join('products', 'orders.pro_id', '=', 'products.id')
            ->select('orders.*','order_details.*','products.pro_name','products.pro_img')
            ->where('orders.id',$id)
            // ->toRawSql();
            // return $order_data;
        ->first();
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
