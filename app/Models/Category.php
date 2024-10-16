<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillable = [
        'name',
        'description',
        'cat_img',
        'status',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'tags',
        'trash',            
];

}
