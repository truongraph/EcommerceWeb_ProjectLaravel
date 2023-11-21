<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // Xử lý lưu tài khoản vào database
        // Validate và lưu dữ liệu từ $request
        //Account::create($validatedData);
        return redirect()->route('admin.accounts.index')->with('success', 'Tạo tài khoản thành công');
    }
    public function edit($id)
    {
        $account = Account::find($id);
        return view('admin.accounts.edit', compact('account'));
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật thông tin tài khoản
        // Validate và cập nhật dữ liệu từ $request
        //Account::where('id', $id)->update($validatedData);
        return redirect()->route('admin.accounts.index')->with('success', 'Cập nhật tài khoản thành công');
    }
    public function delete($id)
    {
        $account = Account::find($id);
        if (!$account) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản');
        }

        $account->delete();
        return redirect()->route('admin.accounts.index')->with('success', 'Đã xoá tài khoản thành công');
    }
}
