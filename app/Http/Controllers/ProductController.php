<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function show($linkProduct)
    {
        $product = Product::findByLinkProduct($linkProduct)->firstOrFail();
        $sizes = Size::where('id_product', $product->id)->get();
        $colors = Color::where('id_product', $product->id)->get();
        $relatedProducts = $product->getRelatedProducts()->take(5);
        // Tách các hình ảnh
        $imagePaths = explode('#', $product->image_product);

        return view('products.show', compact('product','sizes', 'colors', 'relatedProducts', 'imagePaths'));
    }
}
