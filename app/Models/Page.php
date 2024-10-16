<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table='pages';
    protected $fillable = [
        'title',
        'heading',
        'desc',
        'status',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'tags',
        'trash', 
           
];
}
