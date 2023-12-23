<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'discount', 'limit_number', 'number_used', 'expiration_date','payment_limit'];
}
