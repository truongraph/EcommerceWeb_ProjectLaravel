<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminEmailConfigController extends Controller
{
    public function edit()
    {
        // Đọc các giá trị hiện tại từ file .env

        $envValues = [
            'MAIL_MAILER' => env('MAIL_MAILER'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
        ];

        return view('admin.email.edit', compact('envValues'));


    }
    public function update(Request $request)
    {
        // Lưu các giá trị mới vào file .env
        $envFilePath = base_path('.env');

        // Kiểm tra sự tồn tại và quyền ghi của file .env
        if (!File::exists($envFilePath) || !File::isWritable($envFilePath)) {
            return redirect()->route('admin.email.edit')->with('error', 'Không thể cập nhật cấu hình email do file .env không tồn tại hoặc không có quyền ghi.');
        }

        $newMailConfig = [
            'MAIL_MAILER' => $request->input('MAIL_MAILER'),
            'MAIL_HOST' => $request->input('MAIL_HOST'),
            'MAIL_PORT' => $request->input('MAIL_PORT'),
            'MAIL_USERNAME' => $request->input('MAIL_USERNAME'),
            'MAIL_PASSWORD' => $request->input('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => $request->input('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => $request->input('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => $request->input('MAIL_FROM_NAME'),
            // Thêm các trường cấu hình email khác tương tự ở đây
        ];

        foreach ($newMailConfig as $key => $value) {
            $oldValue = env($key);
            $newValue = $request->input($key);
            if ($key === 'MAIL_FROM_NAME') {
                $newValue = empty($newValue) ? '' : '"' . str_replace('"', '\"', $newValue) . '"';
            }
            // Chỉ cập nhật nếu giá trị mới khác giá trị cũ
            if ($oldValue !== $newValue) {
                // Thực hiện cập nhật giá trị trong file .env
                file_put_contents($envFilePath, preg_replace(
                    "/{$key}=(.*)/",
                    $key . '=' . $newValue,
                    file_get_contents($envFilePath)
                ));
            }
        }

        // Cập nhật giá trị trong runtime của ứng dụng Laravel
        Config::set('mail', $newMailConfig);

        return redirect()->route('admin.email.edit')->with('success', 'Cấu hình email đã được cập nhật thành công');
    }
}
