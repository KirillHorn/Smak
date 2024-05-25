<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area_time extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_area_one',
        'id_area_two',
        'time',
    ];

}
