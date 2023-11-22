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
    public function create()
{
    $unlinkedAccounts = Account::whereDoesntHave('customer')->get();
    return view('admin.customers.create', compact('unlinkedAccounts'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name_customer' => 'required',
        'email_customer' => 'required|email|unique:customers,email_customer',
        'phone_customer' => 'required',
        'address_customer' => 'nullable',
        'id_account' => 'nullable|exists:accounts,id',
    ], [
        'email_customer.unique' => 'Email này đã tồn tại.',
    ]);

    try {
        $idAccount = $validatedData['id_account'] ?? 1;

        Customer::create([
            'name_customer' => $validatedData['name_customer'],
            'email_customer' => $validatedData['email_customer'],
            'phone_customer' => $validatedData['phone_customer'],
            'address_customer' => $validatedData['address_customer'],
            'id_account' => $idAccount,
        ]);

        session()->flash('success', 'Khách hàng đã được thêm thành công');
        return redirect()->route('admin.customers.index');
    } catch (\Exception $e) {
        return redirect()->route('admin.customers.create')->withErrors(['error' => $e->getMessage()]);
    }
}
    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.customers.edit', compact('customers'));
    }
    public function update(Request $request, $id)
    {
        // Logic để cập nhật thông tin khách hàng
    }
    public function delete($id)
    {
        $account = Customer::find($id);
        if (!$account) {
            return redirect()->back()->with('error', 'Không tìm thấy khách hàng');
        }

        $account->delete();
        return redirect()->back()->with('success', 'Đã xoá khách hàng thành công');
    }
}
