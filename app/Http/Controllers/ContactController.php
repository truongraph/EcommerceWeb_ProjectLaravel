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
            $message->to('zinhamlovesuu@gmail.com')->subject('Thông tin liên hệ từ form');
        });
        return redirect()->back()->with('success', 'Email đã được gửi thành công!');
    }
}
