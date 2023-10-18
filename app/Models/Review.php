<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Review extends Model
{

    // protected $table = 'reviews';

    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'Comment',
        'UserID',
        'ItemID',
        'Rating',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}