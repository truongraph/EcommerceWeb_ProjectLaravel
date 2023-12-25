<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $login = $request->input('email');
        $password = $request->input('password');

        // Tìm tài khoản theo email hoặc tên người dùng
        $account = User::where(function ($query) use ($login) {
            $query->where('email', $login)->orWhere('name', $login);
        })->first();

        // Kiểm tra xem tài khoản có tồn tại không và mật khẩu đúng hay không
        if ($account && md5($password) === $account->password) {
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
