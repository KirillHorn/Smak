<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories_cafes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_categories',
        'title_categories',
    ];
}
