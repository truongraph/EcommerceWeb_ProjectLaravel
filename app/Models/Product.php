<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['link_product'];
    protected $appends = ['total_stock'];

    public function getTotalStockAttribute()
    {
        $variants = ProductVariant::where('product_id', $this->id)->get();
        return $variants->sum('quantity');
    }
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

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function sizes()
    {
        return $this->hasManyThrough(Size::class, ProductVariant::class, 'product_id', 'id', 'id', 'size_id');
    }

    public function colors()
    {
        return $this->hasManyThrough(Color::class, ProductVariant::class, 'product_id', 'id', 'id', 'color_id');
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
