<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'pro_name',
        'cat_id',
        'pro_id',
        'pro_img',
        'pro_price',
        'pro_quantity',
        'pro_desc',
        'status',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'tags',
        'trash', 
           
];

}
