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
        'id_cafe',
        'id_categories',
    ];

    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'id_categories', 'id');

        // return $this->hasMany(Categories::class, 'id_categories', 'id');
    }

    public function Cafe()
    {
        return $this->belongsTo(Cafe::class, 'id_cafe', 'id');
    }

    public function basket() {
        return $this->belongsTo(baskets::class, 'id');
    }

    public function order() {
        return $this->hasOne(orderCustoms::class);
    }

}
