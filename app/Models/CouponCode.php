<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;
    protected $table='coupon_codes';
    protected $fillable = [
        'coupon_name',
        'discount',
        'coupon_attempt',
        'coupon_limit',
        'is_time',
        'status',
        'trash',
    ];


}
