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
                                <input type="text" class="form-control" id="name_account" name="name_account" value="{{ $account->name_account }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="email_account" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_account" name="email_account" value="{{ $account->email_account }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="password_account" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password_account" name="password_account">
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="parent" class="form-label">Trạng thái</label>
                                <div class="form-check form-switch form-switch-lg mb-lg-3" dir="ltr" bis_skin_checked="1">
                                    <input class="form-check-input" type="checkbox" id="status_account" name="status_account" {{ ($account->status_account == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_account">{{ ($account->status_account == 1) ? 'Hoạt động' : 'Ngừng hoạt động' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div bis_skin_checked="1">
                        <!-- Nút xoá chỉ được hiển thị nếu ID không phải là 1 -->
                        @if($account->id !== 1)
                        <button class="btn btn-success" type="submit">Lưu tài khoản</button>
                        @endif
                        <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary"> Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>
<script>
    // Sự kiện thay đổi cho tên trạng thái
    const checkbox = document.getElementById('status_account');
    checkbox.addEventListener('change', function() {
        const label = document.querySelector('label[for="status_account"]');
        if (checkbox.checked) {
            label.textContent = 'Hoạt động';
            checkbox.value = '1'
        } else {
            label.textContent = 'Ngừng hoạt động';
            checkbox.value = '0';
        }
    });


</script>
@endsection

