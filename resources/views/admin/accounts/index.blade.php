@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold">QUẢN LÝ TÀI KHOẢN</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý tài khoản</li>
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
                <table id="Tabledatatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th style="width: 40px">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1; // Khởi tạo biến đếm
                        @endphp
                        @foreach($accounts as $account)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            <td>{{ $account->name_account  }}</td>
                            <td>{{ $account->email_account }}</td>
                            <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td>@if($account->status_account == 1)
                                <small class="badge badge-soft-success">Hoạt động</small>
                                @elseif($account->status_account == 0)
                                <small class="badge badge-soft-danger">Ngừng hoạt động</small>
                                @endif</td>
                            <td>
                                <div style="display:flex;gap:10px">
                                    @if($account->id !== 1)
                                    <!-- Nút xoá chỉ được hiển thị nếu ID không phải là 1 -->
                                    <a class="btn btn-primary" href="{{ route('admin.accounts.edit', $account->id) }}"><i class="bx bx-edit"></i> Chỉnh sửa</a>
                                    @endif
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



@endsection

