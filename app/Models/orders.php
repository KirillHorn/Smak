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
        'id_street',
        'id_brach',
        'location_details',
        'start_order',
        'end_order',
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
    public function status()
    {
        return $this->belongsTo(statuses::class, 'id_status');
    }
    public function street() {
        return $this->belongsTo(street::class,'id_street');
    }
    function brach_order() {
        return $this->belongsTo(branchs::class,"id_brach","id");
    }
}
