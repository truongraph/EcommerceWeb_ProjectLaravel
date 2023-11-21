<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index()
    {
        // Lấy các sản phẩm mới nhất
        $newestProducts = Product::orderBy('id', 'desc')->take(10)->get();
        $numberbuyProducts = Product::orderBy('number_buy', 'desc')->take(10)->get();
        // Lấy các sp giảm giá
        $sellProducts = Product::where('sellprice_product', '>', 0)
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('home', compact('newestProducts','sellProducts','numberbuyProducts'));
    }
}
