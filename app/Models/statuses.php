<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title'
    ];

    public function order_status() {

        return $this->hasMany(orders::class,'id');
    }
    
}
