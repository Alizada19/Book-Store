<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'userId',
        'orderNo',
        'totalAmount',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    
     // Automatically generate order_number after creation
    protected static function booted()
    {
        static::created(function ($order) {
            $order->orderNo = 'ORD-' . str_pad($order->id, 6, '0', STR_PAD_LEFT);
            $order->save();
        });
    }
}
