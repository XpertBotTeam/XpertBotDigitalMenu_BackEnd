<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'Fname',
        'Lname',
        'email',
        'password',
        'phoneNb',
        'address',
    ];

    // app/Customer.php

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

}
