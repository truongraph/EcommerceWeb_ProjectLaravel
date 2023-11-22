<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminAccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('admin.accounts.index', compact('accounts'));
    }
    public function create()
    {
        return view('admin.accounts.create');
    }
    // public function store(Request $request)
    // {
    //     // Xử lý lưu tài khoản vào database
    //     // Validate và lưu dữ liệu từ $request
    //     //Account::create($validatedData);
    //     return redirect()->route('admin.accounts.index')->with('success', 'Tạo tài khoản thành công');
    // }
    public function edit($id)
    {
        $account = Account::find($id);
        return view('admin.accounts.edit', compact('account'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_account' => 'required',
            'email_account' => 'required',
            'password_account' => 'nullable|min:6',
        ]);
        $existingUsername = Account::where('name_account', $validatedData['name_account'])
            ->where('id', '!=', $id)
            ->first();

        if ($existingUsername) {
            return redirect()->back()->with('error', 'Tên tài khoản đã tồn tại trong hệ thống.');
        }
        $existingEmail = Account::where('email_account', $validatedData['email_account'])
            ->where('id', '!=', $id)
            ->first();

        if ($existingEmail) {
            return redirect()->back()->with('error', 'Email đã tồn tại trong hệ thống.');
        }
        $account = Account::find($id);
        $account->name_account = $validatedData['name_account'];
        $account->email_account = $validatedData['email_account'];
        if ($request->has('password_account') && !empty($validatedData['password_account'])) {
            $account->password_account = md5($validatedData['password_account']);
        }
        $account->save();
        session()->flash('success', 'Chỉnh sửa tài khoản thành công');
        return redirect()->route('admin.accounts.index');
    }
    public function delete($id)
    {
        $account = Account::find($id);
        if (!$account) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản');
        }

        $associatedCustomers = Customer::where('id_account', $id)->count();
        if ($associatedCustomers > 0) {
            return redirect()->back()->with('error', 'Không thể xoá tài khoản. Có khách hàng liên kết với tài khoản này.');
        }

        $account->delete();
        return redirect()->back()->with('success', 'Đã xoá tài khoản thành công');
    }
}
