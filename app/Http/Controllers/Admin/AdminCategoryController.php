<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;




class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        // Lấy danh sách các danh mục cha có status_category = 1 hoặc id_parent là NULL
        $parentCategories = Category::where('status_category', 1)
            ->whereNull('id_parent')
            ->get();
    
        return view('admin.category.create', compact('parentCategories'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required', 
            'link_category' => 'required',
            'id_parent' => 'nullable|exists:categories,id' // Kiểm tra tồn tại của danh mục cha
        ]);
        $validatedData['status_category'] = $request->input('status_category', 1);
        Category::create($validatedData);
        session()->flash('success', 'Danh mục đã được thêm thành công');
        return redirect()->route('admin.categories.index');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        // Lấy danh sách các danh mục cha có status_category = 1 hoặc id_parent là NULL
        $parentCategories = Category::where('status_category', 1)
            ->whereNull('id_parent')
            ->get();
    
        return view('admin.category.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        // Kiểm tra nếu đang cố gắng ngừng kích hoạt và có danh mục con sử dụng id của nó làm id_parent
        if ($request->input('status_category') == 0 && $category->childCategories()->exists()) {
            return redirect()->back()->with('error', 'Không thể ngừng kích hoạt vì danh mục đang được sử dụng làm danh mục cha cho danh mục khác.');
        }
        $validatedData = $request->validate([
            'name_category' => 'required',
            'link_category' => 'required',
            'id_parent' => 'nullable|exists:categories,id'
            // ...các trường khác
        ]);
      // Kiểm tra xem 'status_category' có tồn tại trong mảng không
      $validatedData['status_category'] = $request->has('status_category') ? 1 : 0;
  
        $category->update($validatedData);

        // Thiết lập thông báo cập nhật thành công trong Session
        session()->flash('success', 'Chỉnh sửa danh mục thành công');
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Không tìm thấy danh mục');
        }
    
        // Kiểm tra xem danh mục có tồn tại các danh mục con không
        $childCategories = Category::where('id_parent', $category->id)->count();
        if ($childCategories > 0) {
            return redirect()->back()->with('error', 'Danh mục này có danh mục con. Vui lòng xóa các danh mục con trước khi xóa danh mục này.');
        }
    
        $category->delete();
        return redirect()->back()->with('success', 'Đã xoá danh mục thành công');
    }
}
