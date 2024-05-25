<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id_user',
        'id_product',
        'comments_text',
        'rating',
    ];

    function user_comment() {
        return $this->belongsTo(User::class,"id_user",'id');
    }
    public function order()
    {
        return $this->belongsTo(Orders::class, 'id_orders');
    }
    public function product()
{
    return $this->belongsTo(Products::class, 'id_product');
}
}
