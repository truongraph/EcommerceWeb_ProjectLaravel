<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function sendEmail(Request $request)
    {
        $filled = collect($request->all())->filter(); // Lọc bỏ các trường trống

        if ($filled->count() !== count($request->all())) {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');
        }

        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // Gửi email
        Mail::send('emails.contact', $validatedData, function ($message) use ($validatedData) {
            $message->from($validatedData['email'], $validatedData['fullname']);
            $message->to('huy07112000@gmail.com')->subject('Thông tin liên hệ từ hệ thống Torano Shop');
        });

        return redirect()->back()->with('success', 'Email đã được gửi thành công!');
    }
}
