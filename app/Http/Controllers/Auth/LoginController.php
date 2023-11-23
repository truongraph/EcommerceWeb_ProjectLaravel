<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Lấy thông tin từ form đăng nhập
        $login = $request->input('email');
        $password = md5($request->input('password'));
        $account = User::where(function ($query) use ($login) {
            $query->where('email', $login)
                ->orWhere('name', $login);
        })
            ->where('password', $password)
            ->first();
        // Kiểm tra xem tài khoản có tồn tại và password khớp không
        if ($account) {
            session(['id' => $account->id]);
            Auth::login($account);
            return redirect()->intended('/admin');
        }
        return redirect('/admin/login')->with('error', 'Thông tin tài khoản hoặc mật khẩu không đúng.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }


}
