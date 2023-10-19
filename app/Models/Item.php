<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ItemAvailability;
use Illuminate\Support\Facades\Storage;
class Item extends Model
{


    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'name',
        'price',
        'description',
        'imageURL',
        'ItemAvailability',
    ];


    

    // // Use an accessor to retrieve the full image URL
    // public function getImageURLAttribute($value)
    // {
    //     return asset(Storage::url($value));
    // }
    

    // // Use a mutator to store the image in the storage disk.
    // public function setImageURLAttribute($value)
    // {
    //     $path = Storage::putFile('app/public/images', $value); // Store the image in the 'app/admin/images' directory.
    //     $this->attributes['imageURL'] = $path; // Save the path in the database.
    // }
    
    public static function boot()
    {
        parent::boot();

        // Set the default status to 'Available' when creating a new order
        static::creating(function ($item) {
            $item->ItemAvailability = ItemAvailability::Available;
        });
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
