<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use App\Enums\DeliveryStatus;
use App\Models\User;

class Orders extends Model
{


    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'status',
        'DeliveryInfo',
        'UserID'
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


}
