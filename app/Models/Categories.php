<?php

namespace App\Models;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
    ];

    public function product()
    {
        return $this->hasMany(Products::class,'id');
    }
    public function count_product() {
        return $this->product()->count();
    }
}
