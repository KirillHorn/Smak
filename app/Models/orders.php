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
        'id_status',
        'location',
        'created_at',
    ];

    function user() {
        return $this->belongsTo(User::class,"id_users","id");
    }
    function order_product() {
        return $this->belongsTo(orderCustoms::class,"id");
    }
    public function order_courier_user() {

        return $this->hasMany(courier_orders::class,'id');
    }
    
}
