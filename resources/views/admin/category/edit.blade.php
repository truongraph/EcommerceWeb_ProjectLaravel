<!-- create.blade.php -->
@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold ">CHỈNH SỬA DANH MỤC SẢN PHẨM</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục sản phẩm</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa danh mục sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row" bis_skin_checked="1">
    <div class="col-xl-4" bis_skin_checked="1">
        @if(session('error'))
<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <div class="card" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="name_category" name="name_category" required value="{{ $category->name_category }}">
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="link" class="form-label">Liên kết</label>
                                <input type="text" class="form-control" id="link_category" name="link_category" value="{{ $category->link_category }}">
                            </div>
                        </div>

                    </div>
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="parent" class="form-label">Danh mục cha</label>
                                <select class="form-select" name="id_parent">
                                    <option value="">Chọn danh mục cha</option>
                                    @foreach($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}" {{ ($parentCategory->id == $category->id_parent) ? 'selected' : '' }}>
                                        {{ $parentCategory->name_category }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="parent" class="form-label">Trạng thái</label>
                                <div class="form-check form-switch form-switch-lg mb-lg-3" dir="ltr" bis_skin_checked="1">
                                    <input class="form-check-input" type="checkbox" id="status_category" name="status_category" {{ ($category->status_category == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_category">Kích hoạt</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div bis_skin_checked="1">
                        <button class="btn btn-success" type="submit">Lưu danh mục</button>
                        <a href="#" class="btn btn-danger delete-category" style="float: right" data-id="{{ $category->id }}">Xoá danh mục</a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary" > Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>

{{--
<div class="content-wrapper">
    <section class="content-header">
        <h1>Chỉnh sửa danh mục</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if(session('error'))
                <div class="alert alert-danger  alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>
                @endif
                <div class="box box-primary">
                    <div class="box-body">
                        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Tên danh mục:</label>
                                <input type="text" class="form-control" id="name_category" name="name_category" required value="{{ $category->name_category }}">
                            </div>
                            <div class="form-group">
                                <label for="link">Liên kết:</label>
                                <input type="text" class="form-control" id="link_category" name="link_category" value="{{ $category->link_category }}">
                            </div>
                            <div class="form-group">
                                <label for="parent">Danh mục cha:</label>
                                <select class="form-control" name="id_parent">
                                    <option value="">Chọn danh mục cha</option>
                                    @foreach($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}" {{ ($parentCategory->id == $category->id_parent) ? 'selected' : '' }}>
                                        {{ $parentCategory->name_category }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_category">Trạng thái</label><br>
                                <input type="checkbox" id="status_category" name="status_category" {{ ($category->status_category == 1) ? 'checked' : '' }}>
                                <label for="status_category">Active</label>
                            </div>
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Cập nhật danh mục</button>
                            <a href="#" class="btn btn-danger delete-category" data-id="{{ $category->id }}"><i class="fa fa-trash"></i> Xoá</a>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-warning pull-right"><i class="fa fa-ban"></i> Huỷ bỏ</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#name_category').on('input', function() {
            // Lấy giá trị từ input 'name_category'
            var nameCategory = $(this).val();
            // Chuyển đổi chuỗi thành URL-friendly và gán giá trị cho 'link_category'
             // Loại bỏ dấu tiếng Việt và các ký tự đặc biệt
        var linkCategory = nameCategory
            .toLowerCase()
            .normalize("NFD") // Sử dụng Unicode normalization để loại bỏ dấu
            .replace(/[\u0300-\u036f]/g, "") // Loại bỏ các ký tự diacritic
            .replace(/[^\w\s]/gi, '-') // Thay thế các ký tự không phải chữ cái hoặc số bằng dấu '-'
            .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu '-'
            .replace(/-+/g, '-') // Loại bỏ các dấu '-' liên tiếp
            .replace(/^-|-$/g, ''); // Loại bỏ dấu '-' ở đầu và cuối chuỗi
            $('#link_category').val(linkCategory);
        });
    });
     // Xác nhận trước khi xoá
     const deleteLinks = document.querySelectorAll('.delete-category');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const categoryId = this.getAttribute('data-id');
            Swal.fire({
                title: "Thông báo",
                text: "Bạn có chắc muốn xoá danh mục này không?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c3af",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Đồng ý xoá",
                cancelButtonText: "Huỷ bỏ"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu xác nhận xoá, chuyển hướng tới route delete với ID của danh mục
                    window.location.href = `/admin/categories/delete/${categoryId}`;
                }
            });
        });
    });
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000);
</script>
@endsection

