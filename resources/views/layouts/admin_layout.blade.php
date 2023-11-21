<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Quản lý bán hàng</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Pichforest" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend_area/assets/images/favicon.ico') }}">
  <!-- DataTables -->
  <link href="{{ asset('backend_area/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend_area/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Select datatable -->
  <link href="{{ asset('backend_area/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable -->
  <link href="{{ asset('backend_area/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{ asset('backend_area/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend_area/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend_area/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a  class="logo logo-dark">
                                <span class="logo-sm">
                                   QL
                                </span>
                                <span class="logo-lg">
                                    QUẢN LÝ BÁN HÀNG
                                </span>
                            </a>
                            <a class="logo logo-light">
                                <span class="logo-sm">
                                    QL
                                </span>
                                <span class="logo-lg">
                                    QUẢN LÝ BÁN HÀNG
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <button type="button" class="btn btn-sm px-3 font-size-16 horinav-toggle header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="#" class="text-reset notification-item d-block active">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{URL::to('backend_area/assets/images/avt.png')}}"
                                    alt="Header Avatar">
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header uppercase">@if(Auth::check())
                                    Xin chào, {{ Auth::user()->name }}
                                    @endif</h6>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-logout">Đăng xuất</span></button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">
                                Danh sách menu
                            </li>
                            <li class="{{ Request::is('admin/dashboard*') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                                    <i class='bx bxs-dashboard'></i>
                                    <span key="t-ui-elements">Bảng điều khiển</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/accounts*') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.accounts.index') }}" class="waves-effect {{ Request::is('admin/accounts*') ? 'active' : '' }}">
                                    <i class='bx bxs-user'></i>
                                    <span key="t-ui-elements">Quản lý tài khoản</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/categories*') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.categories.index') }}" class="waves-effect {{ Request::is('admin/categories*') ? 'active' : '' }}">
                                    <i class='bx bxs-bookmarks'></i>
                                    <span key="t-ui-elements">Quản lý danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Quản lý bán hàng.
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>

     <!-- JAVASCRIPT -->
     <script src="{{ asset('backend_area/assets/libs/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('backend_area/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('backend_area/assets/libs/metismenu/metisMenu.min.js') }}"></script>
     <script src="{{ asset('backend_area/assets/libs/simplebar/simplebar.min.js') }}"></script>
     <script src="{{ asset('backend_area/assets/libs/node-waves/waves.min.js') }}"></script>

      <!-- Required datatable js -->
      <script src="{{ asset('backend_area/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

      <!-- Buttons examples -->
      <script src="{{ asset('backend_area/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/jszip/jszip.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-keyTable/js/dataTables.keyTable.min.html') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
      <!-- apexcharts -->
     <script  src="{{ asset('backend_area/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

      <!-- Responsive examples -->
      <script src="{{ asset('backend_area/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('backend_area/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

      <!-- Datatable init js -->
      <script src="{{ asset('backend_area/assets/js/pages/datatables.init.js') }}"></script>
      <!-- dashboard init -->
     <script src="{{ asset('backend_area/assets/js/pages/dashboard.init.js') }}"></script>

      <script src="{{ asset('backend_area/assets/js/app.js') }}"></script>
      <script>
        $(document).ready(function() {
            $('#Tabledatatable').DataTable({
                "language": {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Hiển thị _MENU_ bản ghi",
                    "sZeroRecords": "Không tìm thấy dữ liệu",
                    "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                    "sInfoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "sInfoFiltered": "(được lọc từ _MAX_ tổng số bản ghi)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    }
                }
            });
        });
    </script>
</body>
</html>

