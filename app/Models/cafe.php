<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriesCafes;
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
       
    ];

    public function categoriesCafe()
    {
        return $this->belongsTo(CategoriesCafes::class, 'id_categoriesCafe', 'id_categories');
    }
}
