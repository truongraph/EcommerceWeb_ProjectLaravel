<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Đăng nhập quản lý bán hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Pichforest" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend_area/assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend_area/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend_area/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend_area/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">
    <div class="account-pages" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">

            <div class="row" bis_skin_checked="1">
                <div class="col-md-12" bis_skin_checked="1">
                    <div class="text-center" bis_skin_checked="1">
                        <div bis_skin_checked="1">
                            <div class="row justify-content-center" bis_skin_checked="1">
                                <div class="col-sm-5" bis_skin_checked="1">
                                    <div bis_skin_checked="1">
                                        <img src="{{URL::to('backend_area/assets/images/404.png')}}" alt="404 Error Image" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-uppercase mt-4">Ối.!!! Xin lỗi bạn trang này không tồn tại</h4>
                        <p class="text-muted">Có vẻ như là bạn đã nhập sai liên kết. Vui lòng hãy kiểm tra lại liên kết của mình</p>
                        <div class="mt-5" bis_skin_checked="1">
                            <a class="btn btn-primary waves-effect waves-light" href="javascript:history.go(-1);">Quay trở về</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend_area/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend_area/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend_area/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend_area/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend_area/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend_area/assets/js/pages/datatables.init.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ asset('backend_area/assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('backend_area/assets/js/app.js') }}"></script>
</body>
</html>

