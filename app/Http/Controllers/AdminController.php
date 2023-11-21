<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    // Hiển thị trang Dashboard
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    // Hiển thị trang đăng nhập
    public function showLogin()
    {
        return view('admin.login');
    }


}
