<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['orderid', 'productid', 'colorid', 'sizeid', 'quantity', 'totalprice'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productid');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'colorid');
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class, 'sizeid');
    }

}
