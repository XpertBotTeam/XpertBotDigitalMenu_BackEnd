<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use App\Enums\DeliveryStatus;
use App\Models\Customer;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'status',
        'DeliveryInfo',
        'CustomerID'
    ];

    public static function boot()
    {
        parent::boot();

        // Set the default status to 'Pending' when creating a new order
        static::creating(function ($order) {
            $order->status = OrderStatus::Pending;
            $order->DeliveryInfo = DeliveryStatus::Pending;
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


}
