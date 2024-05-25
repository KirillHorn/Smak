<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id',
        'title_area',
    ];

    public function street_id() {
        return $this->hasMany(street::class,'id');
    }


}
