<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function paymentmethod()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_code');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderid');
    }

    // public function color()
    // {
    //     return $this->belongsTo(Color::class, 'id_color');
    // }

    // public function size()
    // {
    //     return $this->belongsTo(Size::class, 'id_size');
    // }

}
