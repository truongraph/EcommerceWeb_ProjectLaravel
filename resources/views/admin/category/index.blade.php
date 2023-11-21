@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">Quản lý danh mục</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý danh mục</li>
                </ol>
            </div>

        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="card-title-desc">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary waves-effect waves-light"><i class="bx bx-plus"></i> Tạo mới danh mục</a>
                </p>
                <table id="Tabledatatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tên danh mục</th>
                        <th>Liên kết</th>
                        <th>Danh mục cha</th>
                        <th>Trạng thái</th>
                        <th style="width: 40px">Chức năng</th>
                    </tr>
                    </thead>


                    <tbody>
                        @php
                        $count = 1; // Khởi tạo biến đếm
                        @endphp
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            <td>{{ $category->name_category }}</td>
                            <td>{{ $category->link_category }}</td>
                            <td> @if($category->id_parent)
                                {{ $category->parentCategory->name_category }}
                                @endif</td>
                            <td>@if($category->status_category == 1)
                                <small class="badge text-bg-success">Hoạt động</small>
                                @elseif($category->status_category == 0)
                                <small class="badge text-bg-danger">Ngừng hoạt động</small>
                                @else
                                Trạng thái không xác định
                                @endif</td>
                            <td>

                                 <div style="display:flex;gap:10px">
                                    <a class="btn btn-sm btn-dark" href="{{ route('admin.categories.edit', $category->id) }}"><i class="bx bx-edit"></i> Chỉnh sửa</a>
                                    <a href="#" class="btn btn-sm btn-danger delete-category" data-id="{{ $category->id }}"><i class="bx bx-trash"></i> Xoá</a>
                                 </div>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

<script>

     // Xác nhận trước khi xoá
     const deleteLinks = document.querySelectorAll('.delete-category');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const categoryId = this.getAttribute('data-id');
            if (confirm('Bạn có chắc chắn muốn xoá danh mục này không?')) {
                window.location.href = `/admin/categories/delete/${categoryId}`;
            }
        });
    });
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000);
</script>
@endsection
