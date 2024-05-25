<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class street extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title_street',
        
        'id_area',
    ];

    public function area() {
        return $this->belongsTo(area::class,'id_area');
    }
    public function branch() {
        return $this->hasMany(branchs::class,'id');
    }
    public function orders()
    {
        return $this->hasMany(orders::class, 'id_street');
    }
    
}
