<?php

namespace App\Models;
use App\Models\Categories;
use App\Models\Cafe;
use App\Models\baskets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'weight',
        'cost',
        'img',
        'rating_product',
        'id_categories',
    ];

    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'id_categories', 'id');

        // return $this->hasMany(Categories::class, 'id_categories', 'id');
    }
    public function comments()
    {
        return $this->hasMany(comments::class, 'rating_product');
    }

    public function basket() {
        return $this->belongsTo(baskets::class, 'id');
    }

    public function order() {
        return $this->hasOne(orderCustoms::class);
    }

}
