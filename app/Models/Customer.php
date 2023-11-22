<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name_customer', 'email_customer', 'phone_customer', 'address_customer', 'id_account'];
    public function account()
    {
        return $this->belongsTo(Account::class, 'id_account');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_customer');
    }

}
