<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Account;
class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }
    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.customers.edit', compact('customers'));
    }
    public function update(Request $request, $id)
    {

    }
    public function delete($id)
    {
        // $account = Customer::find($id);
        // if (!$account) {
        //     return redirect()->back()->with('error', 'Không tìm thấy khách hàng');
        // }

        // $account->delete();
        // return redirect()->back()->with('success', 'Đã xoá khách hàng thành công');
    }
}
