<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriesCafes;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cafe extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "title",
        "id_categoriesCafe",
        "location",
        "img",
        'id_moder',
        'rating_cafe'
       
    ];

    public function categoriesCafe()
    {
        return $this->belongsTo(CategoriesCafes::class, 'id_categoriesCafe', 'id');
    }
    public function product()
    {
        return $this->hasMany(Products::class , 'id_cafe', 'id');
    }
    public function comments()
{
    return $this->hasMany(comments::class, 'id_cafe');
}

public function count_product() {
    return $this->product()->count();
}

}
