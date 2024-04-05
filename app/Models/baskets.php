<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class baskets extends Model
{
    use HasFactory;
    protected $fillable =
    ['id','id_users','id_product','count'];

    public function products() {
        return $this->belongsTo(Products::class, 'id_product','id');
    }
}
