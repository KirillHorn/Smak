<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'amount',
        'id_users',
        'comment',
        'paymant',
        'location',
        'created_at',
    ];
    
}
