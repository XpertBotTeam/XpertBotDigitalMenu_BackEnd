<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';


    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'CategoryName',
    ];
}
