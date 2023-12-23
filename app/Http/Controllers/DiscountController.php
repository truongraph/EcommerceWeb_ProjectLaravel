<?php

namespace App\Http\Controllers;
use App\Models\Discount;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DiscountController extends Controller
{
    public function index()
    {
    // Lấy danh sách các mã giảm giá
    $discounts = Discount::where('code', 'like', 'Dis%')->get();

    // Xóa các mã giảm giá hết hạn trước khi lấy dữ liệu
    Discount::whereDate('expiration_date', '<', Carbon::now())->delete();

    return view('discounts.index', compact('discounts'));
    }
}
