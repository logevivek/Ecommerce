<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = collect(
            [
                [
                    'pro_id'=>1,
                    'order_id'=>'ORD0001',
                    'pro_price'=> 8000,
                    'pro_quantity'=> 10
                ],
    
                [
                    'pro_id'=>2,
                    'order_id'=>'ORD0002',
                    'pro_price'=> 5000,
                    'pro_quantity'=> 12
                ],
    
                [
                    'pro_id'=>3,
                    'order_id'=>'ORD0003',
                    'pro_price'=> 4000,
                    'pro_quantity'=> 22
                ]
    

            ]
                );


           $orders->each(function($order){
                Order::insert($order);

           });   


    }
}
