<!-- create.blade.php -->
@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">Thêm mới danh mục</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý danh mục</a></li>
                    <li class="breadcrumb-item active">Thêm mới danh mục</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row" bis_skin_checked="1">
    <div class="col-xl-4" bis_skin_checked="1">
        <div class="card" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <form  method="post" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="name_category" name="name_category" required>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="link" class="form-label">Liên kết</label>
                                <input type="text" class="form-control" id="link_category" name="link_category">
                            </div>
                        </div>
                    </div>
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="parent" class="form-label">Danh mục cha</label>
                                <select class="form-select" id="parent" name="id_parent">
                                    <option value="">Không có</option>
                                    @foreach($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}">{{ $parentCategory->name_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div bis_skin_checked="1">
                        <button class="btn btn-success" type="submit">Lưu danh mục</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-warning pull-right" style="float: right">Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#name_category').on('input', function() {
            // Lấy giá trị từ input 'name_category'
            var nameCategory = $(this).val();
            // Chuyển đổi chuỗi thành URL-friendly và gán giá trị cho 'link_category'
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

</script>
@endsection

