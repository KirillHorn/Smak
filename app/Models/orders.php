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
        'id_courier',
        'paymant',
        'id_status',
        'location',
        'created_at',
    ];
    
}
