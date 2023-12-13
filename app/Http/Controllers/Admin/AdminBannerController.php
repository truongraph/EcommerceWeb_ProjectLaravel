<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query();
        if ($request->has('type_filter')) {
            $query->where('type', 'like', '%' . $request->input('type_filter') . '%');
        }
        // Lọc theo trạng thái
        if ($request->has('status_filter')) {
            $status = $request->input('status_filter');
            if ($status == 'active') {
                $query->where('status_product', 1);
            } elseif ($status == 'inactive') {
                $query->where('status_product', 0);
            }
        }
        $banners = $query->get();
        return view('admin.banners.banners', compact('banners'));
    }
    public function store(Request $request)
    {
        $bannerType = $request->input('banner_type');
        if ($bannerType === 'main') {
            $mainBannersCount = Banner::where('type', 'main')->where('status', 1)->count();

            if ($mainBannersCount >= 5) {
                return redirect()->back()->with('error', 'Bạn không thể thêm nhiều hơn 5 loại banner chính.');
            }
        } elseif ($bannerType === 'secon1' || $bannerType === 'secon2' || $bannerType === 'secon3' || $bannerType === 'secon4') {
            $seconBannersCount = Banner::where('type', $bannerType)->where('status', 1)->count();

            if ($seconBannersCount >= 1) {
                return redirect()->back()->with('error', 'Bạn chỉ có thể thêm 1 banner cho mỗi loại banner phụ.');
            }
        }
        $banner = new Banner();
        $banner->link = $request->input('link');
        $banner->type = $request->input('banner_type');
        $banner->status = 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/banners/' . $banner->type), $imageName);
            $banner->image = $imageName;
        }
        $banner->save();
        return redirect()->back()->with('success', 'Banner đã được lưu thành công');

    }

    public function delete($id)
    {
        // Tìm banner cần xoá
        $banner = Banner::findOrFail($id);

        // Xoá hình ảnh từ thư mục
        $imagePath = public_path('img/banners/' . $banner->type . '/' . $banner->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xoá tệp hình ảnh từ thư mục
        }

        // Xoá banner khỏi cơ sở dữ liệu
        $banner->delete();

        return redirect()->back()->with('success', 'Xoá banner thành công');
    }

    public function activate($id)
    {
        // Tìm banner cần kích hoạt/ngừng kích hoạt
        $banner = Banner::findOrFail($id);
        $bannerType = $banner->type;
        $status = $banner->status;

        if ($bannerType === 'main') {
            $mainBannersCount = Banner::where('type', 'main')->where('status', 1)->count();

            if ($status == 1 && $mainBannersCount <= 5) {
                $banner->status = 0;
                $banner->save();
                return redirect()->back()->with('success', 'Banner đã được ngừng kích hoạt');
            } elseif ($status == 0 && $mainBannersCount < 5) {
                $banner->status = 1;
                $banner->save();
                return redirect()->back()->with('success', 'Banner đã được kích hoạt');
            } else {
                return redirect()->back()->with('error', 'Không thể thực hiện thay đổi trạng thái cho banner này');
            }
        } elseif (in_array($bannerType, ['secon1', 'secon2', 'secon3', 'secon4'])) {
            $seconBannersCount = Banner::where('type', $bannerType)->where('status', 1)->count();

            if ($status == 1 && $seconBannersCount == 1) {
                $banner->status = 0;
                $banner->save();
                return redirect()->back()->with('success', 'Banner đã được ngừng kích hoạt');
            } elseif ($status == 0 && $seconBannersCount == 0) {
                $banner->status = 1;
                $banner->save();
                return redirect()->back()->with('success', 'Banner đã được kích hoạt');
            } else {
                return redirect()->back()->with('error', 'Không thể thực hiện thay đổi trạng thái cho banner này');
            }
        }
    }


}
