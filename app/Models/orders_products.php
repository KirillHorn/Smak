<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_products extends Model
{
    use HasFactory;

    protected  $fillable = [
        'id_basket', 'count',	
    ];

 
}
