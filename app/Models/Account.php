<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Account extends Authenticatable
{
    use HasFactory;
    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_account', 'email_account', 'password_account', 'reset_password_token'
    ];

    protected $hidden = [
        'password_account', 'remember_token',
    ];
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id_account');
    }
}
