<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>For Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .space_between{
                display: flex;
                flex: 1;
                justify-content: space-between;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('admin.showindex') }}">Admin</a>
            <!-- Sidebar Toggle-->

            <div class="space_between">
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ route('admin.loginform') }}"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    @if (session()->has('dangnhap'))
                    {{ session('dangnhap')['hoten'] }}
                    @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (session()->has('dangnhap'))
                        <li>
                            <a class="dropdown-item" href="{{ url('admin/informad') }}/{{ session('dangnhap')['email'] }}">Thông tin admin</a>
                        </li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('admin.loginform') }}">Đăng nhập</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.formreg') }}">Đăng ký</a></li>
                        @endif
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        @if (session()->has('dangnhap'))
                            @if(session('dangnhap')["phanquyen"] == 1)
                            <div class="nav">
                                <a class="nav-link" href="{{ route('admin.showindex') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Quản lý
                                </a>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Danh mục
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('admin.danhmuc') }}">Bảng danh mục</a>
                                        <a class="nav-link" href="{{ route('admin.formthem') }}">Thêm danh mục</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Sách
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('admin.sach') }}">Bảng sách</a>
                                        <a class="nav-link" href="{{ route('admin.formthemsach') }}">Thêm sách</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNXB" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Nhà xuất bản
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseNXB" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('admin.nxb') }}">Danh sách NXB</a>
                                        <a class="nav-link" href="{{ route('admin.formthemnxb') }}">Thêm nhà xuất bản</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAuthor" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Tác giả
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseAuthor" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('admin.tg') }}">Danh sách tác giả</a>
                                        <a class="nav-link" href="{{ route('admin.formthemtg') }}">Thêm tác giả</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="{{ route('admin.dsdonhang') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Đơn hàng
                                </a>
                                <a class="nav-link" href="{{ route('admin.doanhthu') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Thống kê
                                </a>
                                <a class="nav-link" href="{{ route('admin.dskh') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Khách Hàng
                                </a>
                                <a class="nav-link" href="{{ route('admin.km') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Khuyến mãi
                                </a>
                            </div>
                        </div>
                        @elseif(session('dangnhap')["phanquyen"]==2)
                        <div class="nav">
                            <a class="nav-link" href="{{ route('admin.showindex') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh mục
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.danhmuc') }}">Bảng danh mục</a>
                                    <a class="nav-link" href="{{ route('admin.formthem') }}">Thêm danh mục</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Sách
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.sach') }}">Bảng sách</a>
                                    <a class="nav-link" href="{{ route('admin.formthemsach') }}">Thêm sách</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNXB" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Nhà xuất bản
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseNXB" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.nxb') }}">Danh sách NXB</a>
                                    <a class="nav-link" href="{{ route('admin.formthemnxb') }}">Thêm nhà xuất bản</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAuthor" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Tác giả
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAuthor" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.tg') }}">Danh sách tác giả</a>
                                    <a class="nav-link" href="{{ route('admin.formthemtg') }}">Thêm tác giả</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ route('admin.dsdonhang') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Đơn hàng
                            </a>
                            <a class="nav-link" href="{{ route('admin.doanhthu') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Thống kê
                            </a>
                            <a class="nav-link" href="{{ route('admin.dskh') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Khách Hàng
                            </a>
                            <a class="nav-link" href="{{ route('admin.km') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Khuyến mãi
                            </a>
                        </div>
                    </div>
                        @else
                        <div class="nav">
                            <a class="nav-link" href="{{ route('admin.dsdonhang') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Đơn hàng
                            </a>
                            <a class="nav-link" href="{{ route('admin.doanhthu') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Thống kê
                            </a>
                            <a class="nav-link" href="{{ route('admin.dskh') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Khách Hàng
                            </a>
                        </div>
                        @endif
                        @else
                           <p>&nbsp; Hãy <a href="{{  route('admin.loginform') }}">đăng nhập </a></p>
                        @endif

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:
                        @if (session()->has('dangnhap'))
                        {{ session('dangnhap')['hoten'] }}
                        @endif
                        </div>
                    </div>
                </nav>
            </div>
@yield('content')
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
</body>
</html>

