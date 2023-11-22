<!-- create.blade.php -->
@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">THÊM MỚI KHÁCH HÀNG</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý khách hàng</a></li>
                    <li class="breadcrumb-item active">Thêm mới khách hàng</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row" bis_skin_checked="1">
    <div class="col-xl-4" bis_skin_checked="1">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <div class="card" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <form role="form" method="POST" action="{{ route('admin.customers.store') }}">
                    @csrf
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="name_customer" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="email_customer" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_customer" name="email_customer" value="{{ old('email_customer') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="phone_customer" class="form-label">Số điện thoại</label>
                                <input type="number" class="form-control" id="phone_customer" name="phone_customer" value="{{ old('phone_customer') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="address_customer" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address_customer" name="address_customer" value="{{ old('address_customer') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="mb-3" bis_skin_checked="1">
                                <label for="id_account " class="form-label">Tài khoản liên kết</label>
                                <select class="form-select" id="id_account" name="id_account">
                                    <option value="">Chọn tài khoản</option>
                                    @foreach($unlinkedAccounts as $account)
                                    <option value="{{ $account->id }}" data-email="{{ $account->email_account }}">{{ $account->name_account }} - {{ $account->email_account }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div bis_skin_checked="1">
                        <button class="btn btn-success" type="submit">Lưu khách hàng</button>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary pull-right">Huỷ bỏ</a>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div> <!-- end col -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_account').change(function() {
            var selectedAccountId = $(this).val();
            var selectedAccountEmail = $('#id_account option:selected').data('email');

            if (selectedAccountId !== '') {
                $('#email_customer').val(selectedAccountEmail).prop('readonly', true);
            } else {
                $('#email_customer').val('').prop('readonly', false);
            }
        });

        // Ngăn người dùng nhập liệu vào trường email_customer
        $('#email_customer').on('input', function() {
            var selectedAccountId = $('#id_account').val();
            if (selectedAccountId !== '') {
                $(this).val($('#id_account option:selected').data('email'));
            }
        });
    });

</script>
@endsection

