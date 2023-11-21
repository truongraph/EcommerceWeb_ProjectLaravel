<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name_product', 'like', "%$query%")->get();

        return view('search.index', compact('products', 'query'));
    }
}
