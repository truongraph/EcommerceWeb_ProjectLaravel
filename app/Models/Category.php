<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_category', 
        'link_category', 
        'id_parent',
        'status_category', 
    ];
    protected $primaryKey = 'id';
    
    public function getRouteKeyName()
    {
        return 'link_category';
    }
    public static function allCategories()
    {
        return static::all();
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'id_parent')->with('childCategories');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'id_parent');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Lấy số cuối cùng trong cột sort và tăng lên 1 để gán cho sort của category mới
            $lastSortNumber = static::max('sort') ?? 0;
            $category->sort = $lastSortNumber + 1;
        });
    }

}
