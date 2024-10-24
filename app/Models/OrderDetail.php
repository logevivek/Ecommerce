<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='order_details';
    protected $fillable = [

        'first_name',
        'last_name',
        'phone',
        'email',
        'country',
        'state',
        'city',
        'address',
        'pincode', 
        'order_id',
        'customer_id',
        'pay_mode',
        'total_amount',
        'coupon_discount',
        'grand_total',

           
];



}
