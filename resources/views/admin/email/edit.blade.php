@extends('layouts.admin_layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold ">CẤU HÌNH EMAIL</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cấu hình email</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.email.update') }}">
                        @csrf
                        <div class="row" bis_skin_checked="1">
                            @foreach($envValues as $key => $value)
                            <div class="col-md-6 mb-3">
                                <label for="{{ $key }}" class="form-label">{{ $key }}</label>
                                <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}"
                                    value="{{ $value }}">
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-success"><i class="bx bx-save"></i> Cập nhật thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
