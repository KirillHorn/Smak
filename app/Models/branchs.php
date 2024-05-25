<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriesCafes;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class branchs extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "title",
        'phone',
        "img",
        'id_street',
        'location_detalis'
       
    ];
public function street()
{
    return $this->belongsTo(street::class, 'id_street');
}

public function order()
{
    return $this->hasMany(orders::class, 'id');
}
protected static function boot()
{
    parent::boot();

    static::deleting(function($cafe) {
        $user = User::find($cafe->id_user);
        if ($user) {
            $user->delete();
        }
    });
}
}
