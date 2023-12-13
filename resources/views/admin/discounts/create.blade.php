<!-- create.blade.php -->
@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">THÊM MỚI MÃ GIẢM</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Danh sách mã giảm</a></li>
                    <li class="breadcrumb-item active">Thêm mới mã giảm</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.discounts.store') }}">
                        @csrf
                        <div class="row" bis_skin_checked="1">
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="code" class="form-label">Tên mã giảm</label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="discount" class="form-label">Số tiền giảm</label>
                                    <input type="text" oninput="formatNumber(this)" class="form-control"
                                        id="discount" name="discount" required>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="limit_number" class="form-label">Giới hạn số lần</label>
                                    <input type="text" oninput="formatNumber(this)" class="form-control"
                                        id="limit_number" name="limit_number" required>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="expiration_date" class="form-label">Ngày hết hạn</label>
                                    <input type="text" class="form-control pickdate" id="expiration_date" required
                                        name="expiration_date">
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="mb-3" bis_skin_checked="1">
                                    <label for="payment_limit" class="form-label">Thanh toán tối thiểu</label>
                                    <input type="text" oninput="formatNumber(this)" class="form-control"
                                        id="payment_limit" name="payment_limit" required>
                                </div>
                            </div>
                        </div>
                        <div bis_skin_checked="1">
                            <button class="btn btn-success" type="submit"><i class="bx bx-save"></i> Lưu danh
                                mục</button>
                            <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary"><i
                                    class="bx bx-x-circle"></i> Huỷ bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function formatNumber(input) {
    // Xóa các ký tự không phải số khỏi giá trị nhập vào
    let value = input.value.replace(/\D/g, '');

    // Định dạng số có dấu phân cách hàng nghìn, nếu có giá trị thì mới định dạng
    if (value !== '') {
        value = new Intl.NumberFormat('en-US').format(value);
    }

    // Gán giá trị đã định dạng trở lại vào input
    input.value = value;
}
</script>
@endsection
