<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        "title",
        "id_categoriesCafe",
        "document",
        "location",
        "img",
        'id_status'
    ];
}
