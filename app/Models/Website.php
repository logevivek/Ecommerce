<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $table='websites';
    protected $fillable = [
        'web_address',
        'web_mobile',
        'web_email',
        'web_logo',
          
    ];
}
