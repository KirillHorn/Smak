<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\cafe;

class categories_cafes extends Model
{
    use HasFactory;

    public $table = "categories_cafe";
    protected $fillable = [
        'id_categories',
        'title_categories',
    ];
    public function cafe()
    {
        return $this->hasMany(cafe::class);
    }
}
