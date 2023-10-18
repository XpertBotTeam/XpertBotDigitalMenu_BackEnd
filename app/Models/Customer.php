<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Customer extends Model implements Authenticatable
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



    
    public function getAuthIdentifierName()
    {
        return 'id'; // Change 'id' to the actual name of the primary key in your 'customers' table
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
