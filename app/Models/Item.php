<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ItemAvailability;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'imageURL',
        'ItemAvailability',
    ];

    
    public static function boot()
    {
        parent::boot();

        // Set the default status to 'Pending' when creating a new order
        static::creating(function ($item) {
            $item->ItemAvailability = ItemAvailability::Available;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
