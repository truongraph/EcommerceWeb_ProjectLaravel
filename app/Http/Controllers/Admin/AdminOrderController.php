<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('paymentmethod');

        // Lọc theo tên, mã, số điện thoại, email
        $nameCodeEmailPhone = $request->input('namecodeemailphone_filter');
        if ($nameCodeEmailPhone) {
            $query->where(function ($q) use ($nameCodeEmailPhone) {
                $q->where('name_order', 'like', '%' . $nameCodeEmailPhone . '%')
                    ->orWhere('code_order', 'like', '%' . $nameCodeEmailPhone . '%')
                    ->orWhere('email_order', 'like', '%' . $nameCodeEmailPhone . '%')
                    ->orWhere('phone_order', 'like', '%' . $nameCodeEmailPhone . '%');
            });
        }

        $paymentFilter = $request->input('payment_filter');
        if ($paymentFilter) {
            $query->whereHas('paymentmethod', function ($q) use ($paymentFilter) {
                $q->where('id', $paymentFilter);
            });
        }

        $statusFilter = $request->input('status_filter');
        if ($statusFilter !== null) {
            $query->where('status_order', $statusFilter);
        }

        $startDate = $request->input('start_date_filter');
        $endDate = $request->input('end_date_filter');

        if ($startDate && $endDate) {
            $query->whereBetween('date_order', [
                Carbon::createFromFormat('d/m/Y H:i', $startDate)->format('Y-m-d H:i:s'),
                Carbon::createFromFormat('d/m/Y H:i', $endDate)->format('Y-m-d H:i:s')
            ]);
        } elseif ($startDate) {
            $query->where('date_order', '>=', Carbon::createFromFormat('d/m/Y H:i', $startDate)->format('Y-m-d H:i:s'));
        } elseif ($endDate) {
            $query->where('date_order', '<=', Carbon::createFromFormat('d/m/Y H:i', $endDate)->format('Y-m-d H:i:s'));
        }

        $paymentMethods = Payment::pluck('name_payment', 'id');

        $orders = $query->get();

        return view('admin.orders.index', compact('orders', 'paymentMethods'));
    }

    public function updateStatus($id, $status)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }
        $order->status_order = $status;
        $order->save();

        return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');
    }
    public function view($id)
    {
        $order = Order::findOrFail($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }
        $orderDetails = $order->orderDetails;
        return view('admin.orders.view', compact('order', 'orderDetails'));
    }

    public function printInvoice($id)
    {
        $order = Order::findOrFail($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }
        $orderDetails = $order->orderDetails;

        // Trả về view hoặc PDF để in hoá đơn
        return view('admin.orders.invoice', compact('order', 'orderDetails'));
    }
}
