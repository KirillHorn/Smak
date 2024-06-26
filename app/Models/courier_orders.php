<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courier_orders extends Model
{
    use HasFactory;

    protected $fillable =
    ['id_orders',
    'id_courier'];

    public function order_user() {
        return $this->belongsTo(orders::class,'id_orders','id');
    }
    public function completedOrdersCount()
    {
        return $this->order_user()->where('id_status', 3)->count(); // Предполагаем, что статус "2" означает выполненный заказ
        
    }
 
}
