@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold ">CHỈNH SỬA KHÁCH HÀNG</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý khách hàng</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa khách hàng</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row" bis_skin_checked="1">
    <div class="col-xl-12" bis_skin_checked="1">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <form method="POST" action="{{ route('admin.customers.update', $customers->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-2" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="name" class="form-label">Tên khách hàng</label>
                                <input type="text" class="form-control" id="name_customer" name="name_customer" required value="{{ $customers->name_customer }}">
                            </div>
                        </div>
                        <div class="col-md-2" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="email" class="form-label">Tài khoản liên kết</label>
                                <input type="email" class="form-control" id="id_account" name="id_account" required value="{{ $customers->account->name_account }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_customer" name="email_customer" required value="{{ $customers->email_customer }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="number" class="form-control" id="phone_customer" name="phone_customer" required value="{{ $customers->phone_customer }}">
                            </div>
                        </div>
                        <div class="col-md-4" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address_customer" name="address_customer" required value="{{ $customers->address_customer }}">
                            </div>
                        </div>
                    </div>
                    <div bis_skin_checked="1" class="text-right">
                        <button class="btn btn-success" type="submit"><i class="bx bxs-save"></i> Lưu tài khoản</button>
                        <a href="#" class="btn btn-danger delete-customer" style="float: right" data-id="{{ $customers->id }}"><i class="bx bxs-trash"></i> Xoá khách hàng</a>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary"><i class="bx bxs-x-circle"></i> Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>
<script>
    // Xác nhận trước khi xoá
        const deleteLinks = document.querySelectorAll('.delete-customer');
        deleteLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const customersid = this.getAttribute('data-id');
                Swal.fire({
                    title: "Thông báo"
                    , text: "Bạn có chắc muốn xoá khách hàng này không?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#34c3af"
                    , cancelButtonColor: "#f46a6a"
                    , confirmButtonText: "Đồng ý xoá"
                    , cancelButtonText: "Huỷ bỏ"
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = `/admin/customers/delete/${customersid }`;
                    }
                });
            });
        });
    </script>
@endsection

