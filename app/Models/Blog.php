<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blogs';
    protected $fillable = [
        'title',
        'heading',
        'blog_desc',
        'blog_banner',
        'status',
        'meta_title',
        'meta_description',
        'tags',
        'trash',
           
    ];

}

