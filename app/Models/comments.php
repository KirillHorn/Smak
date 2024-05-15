<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id_user',
        'id_cafe',
        'comments_text',
        'rating',
    ];

    function user_comment() {
        return $this->belongsTo(User::class,"id_user",'id');
    }
    public function order()
    {
        return $this->belongsTo(Orders::class, 'id_orders');
    }
    public function cafe()
{
    return $this->belongsTo(Cafe::class, 'id_cafe');
}
}
