@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold ">CHỈNH SỬA TÀI KHOẢN</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý tài khoản</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa tài khoản</li>
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
                <form method="POST" action="{{ route('admin.accounts.update', $account->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="name_account" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" id="name_account" name="name_account" value="{{ $account->name_account }}">
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="email_account" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_account" name="email_account" value="{{ $account->email_account }}">
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="password_account" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password_account" name="password_account">
                            </div>
                        </div>
                    </div>
                    <div bis_skin_checked="1">
                        <button class="btn btn-success" type="submit">Lưu tài khoản</button>
                        <a href="#" class="btn btn-danger delete-accounts" style="float: right" data-id="{{ $account->id }}">Xoá tài khoản</a>
                        <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary" > Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>
<script>
    const deleteLinks = document.querySelectorAll('.delete-accounts');
        deleteLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const accountID = this.getAttribute('data-id');
                Swal.fire({
                    title: "Thông báo",
                    text: "Bạn có chắc muốn xoá tài khoản này không?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34c3af",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Đồng ý xoá",
                    cancelButtonText: "Huỷ bỏ"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Nếu xác nhận xoá, chuyển hướng tới route delete với ID của danh mục
                        window.location.href = `/admin/accounts/delete/${accountID}`;
                    }
                });
            });
        });
    </script>
@endsection
