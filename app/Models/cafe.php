<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\categories_cafes;

class cafe extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_cafe",
        "title",
        "id_categoriesCafe",
        "location",
        "img",
       
    ];

    public function categories_cafes()
    {
        return $this->hasMany(categories_cafes::class);
    }
}
