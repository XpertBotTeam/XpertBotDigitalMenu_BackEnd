<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    // protected $table = 'reviews';

    use HasFactory;
    protected $fillable = [
        'Comment',
        'CustomerID',
        'ItemID',
        'Rating',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}