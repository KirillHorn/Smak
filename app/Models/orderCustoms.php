<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderCustoms extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'product',
        'count'
    ];

    public function product_order() 
    {
        return $this->belongsTo(Products::class, 'product');
    }
}
