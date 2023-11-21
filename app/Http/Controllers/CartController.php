<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Support\Facades\Response;
use Cart;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productid = $request->input('product_id');
        $quantity = $request->input('quantity');
        $sizeid = $request->input('size');
        $colorid = $request->input('color');
        // Lấy thông tin sản phẩm từ database
        $product = Product::findOrFail($productid);
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        // Tạo key duy nhất cho sản phẩm trong giỏ hàng với size và color
        $cartKey = $productid . '_' . $sizeid . '_' . $colorid;
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        if (isset($cart[$cartKey])) {
            // Nếu đã tồn tại, cập nhật số lượng
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng
            $cart[$cartKey] = [
                'name' => $product->name_product,
                'linkproduct' => $product->link_product,
                'quantity' => $quantity,
                'price' => $product->price_product,
                'sellprice' => $product->sellprice_product,
                'image' => $product->avt_product,
                'size' => Size::findOrFail($sizeid)->desc_size,
                'color' => Color::findOrFail($colorid)->desc_color,
                'sizeid' => $sizeid,
                'colorid' => $colorid,
            ];
        }
        // Lưu giỏ hàng mới vào session
        session()->put('cart', $cart);
        return Response::json(['message' => 'Thêm sản phẩm thành công', 'redirect' => route('cart.index')], 200);
    }

    public function removeFromCart(Request $request)
    {
        $productid = $request->input('product_id');
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productid])) {
            // Nếu tồn tại, xóa sản phẩm khỏi giỏ hàng
            unset($cart[$productid]);
            // Lưu giỏ hàng mới vào session
            session()->put('cart', $cart);
            return Response::json(['message' => 'Đã xoá thành công sản phẩm'], 200);
        }
        return Response::json(['message' => 'Sản phẩm không còn tồn tại'], 404);
    }

    public function changeQuantity(Request $request)
    {
        $productid = $request->input('product_id');
        $action = $request->input('action');
        $quantity = $request->input('quantity');

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productid])) {
            // Nếu tồn tại, thay đổi số lượng dựa vào action
            if ($action === 'update') {
                // Cập nhật số lượng sản phẩm
                $cart[$productid]['quantity'] = $quantity;
            } elseif ($action == 'increase') {
                $cart[$productid]['quantity'] += 1;
            } elseif ($action == 'decrease') {
                $cart[$productid]['quantity'] -= 1;
                if ($cart[$productid]['quantity'] <= 0) {
                    // Nếu số lượng nhỏ hơn hoặc bằng 0, xóa sản phẩm khỏi giỏ hàng
                    unset($cart[$productid]);
                }
            }

            // Lưu giỏ hàng mới vào session
            session()->put('cart', $cart);

            return Response::json(['message' => 'Thay đổi số lượng thành công'], 200);
        }

        return Response::json(['message' => 'Không tìm thấy sản phẩm trong giỏ'], 404);
    }


    public function index()
    {
        $cart = session()->get('cart', []);
       // Tính tổng tiền
       $total = 0;
       foreach ($cart as $item) {
        if ($item['sellprice'] > 0) {
            $total += $item['sellprice'] * $item['quantity'];
        } else {
            $total += $item['price'] * $item['quantity'];
        }
    }

       return view('cart.index', compact('cart', 'total'));
    }
    public function showCart()
    {
        $cart = session()->get('cart', []);
        // Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            if ($item['sellprice'] > 0) {
                $total += $item['sellprice'] * $item['quantity'];
            } else {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return view('cart.index', compact('cart', 'total'));
    }
}
