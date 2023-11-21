<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['link_product'];
    public function scopeFindByLinkProduct($query, $linkProduct)
    {
        return $query->where('link_product', $linkProduct);
    }
    public function getRouteKeyName()
    {
        return 'link_product';
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function sizes()
    {
        return $this->hasMany(Size::class, 'id_product');
    }

    public function colors()
    {
        return $this->hasMany(Color::class, 'id_product');
    }

    public function getRelatedProducts()
    {
        if ($this->category) {
            return $this->category->products->where('id', '!=', $this->id);
        }

        return collect();
    }

    public function getImages()
    {
        return explode('#', $this->image_product);
    }
}
