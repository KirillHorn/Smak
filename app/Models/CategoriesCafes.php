<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cafe;

class CategoriesCafes extends Model
{
    use HasFactory;

    public $table = "categories_cafe";
    protected $fillable = [
        'id',
        'title_categories',
    ];
    public function cafe()
    {
        return $this->hasMany(Cafe::class , 'id_categoriesCafe', 'id');
    }

   
}
