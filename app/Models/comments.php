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
}
