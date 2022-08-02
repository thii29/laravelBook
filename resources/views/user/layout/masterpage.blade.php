<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <!--Bootstrap-->
    <style>
        .hidden-1{
            display: none;
        }
        .open{
            display: block;
        }
    </style>
</head>

<body>

<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">BOOK</span>STORE</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">

        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="{{ route('user.giohang') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge"><span id="count-qty-cart">{{ Cart::count() }}</span></span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block category">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav
                class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden hidden-1 danhmuclist">
                    @foreach ($danhmuc as $dm)
                        @if ($dm->trangthai == 1)
                            <a href="{{ route('user.danhmucsach',$dm->madm) }}" class="nav-item nav-link">{{ $dm->tendm }}</a>
                        @endif
                    @endforeach
                </div>
                <script>
                    var categoryElement = document.querySelector('.category');
                    //console.log(categoryElement);
                    categoryElement.onclick=function(){
                        var x = document.querySelector('.danhmuclist');
                        if (x.style.display === "none") {
                          x.style.display = "block";
                        } else {
                          x.style.display = "none";
                        }
                    }
                </script>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link active">Trang chủ</a>
                        <a href="{{ route('user.shop') }}" class="nav-item nav-link">Danh mục</a>
                        <a href="{{ route('user.contact') }}" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user fa-fw"></i> &nbsp;
                                @if(session()->has('login'))
                                    Xin chào, {{ session('login')['hoten'] }}
                                @endif
                            </button>
                            <div class="dropdown-menu">
                                @if (session()->has('login'))
                                    <a class="dropdown-item"
                                       href="{{ route('user.infor',session('login')['email'])  }}">Thông tin cá nhân</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}">Đăng xuất</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('user.loginform') }}">Đăng nhập </a>
                                    <a class="dropdown-item" href="{{ route('user.formreg') }}">Đăng ký </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
                <div class="row px-xl-5 pt-5">
                    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                        <a href="/" class="text-decoration-none">
                            <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                                    class="text-primary font-weight-bold border border-white px-3 mr-1">BOOK</span>Store
                            </h1>
                        </a>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>180, Cao Lỗ, Tp.HCM</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>dh51800586@student.stu.edu.vn
                        </p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-dark mb-4">Danh mục</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Home</a>

                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-dark mb-4">Menu</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Trang
                                        chủ</a>
                                    <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Đăng
                                        nhập</a>
                                    <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Đăng
                                        ký</a>
                                    <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Liên
                                        hệ</a>
                                    <a class="text-dark mb-2" href="checkout.html"><i
                                            class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-dark mb-4">Hỗ trợ</h5>
                                <form action="{{ route('user.sendamil') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="hoten" class="form-control border-0 py-4" placeholder="Your Name"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control border-0 py-4" placeholder="Your Email"
                                               required="required"/>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Gửi
                                        </button>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row border-top border-light mx-xl-5 py-4">
                    <div class="col-md-6 px-xl-0">
                        <p class="mb-md-0 text-center text-md-left text-dark">
                            &copy; <a class="text-dark font-weight-semi-bold" href="#">Book Store</a>. All Rights
                            Reserved. Designed
                            by
                            <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

            <!-- Contact Javascript File -->
            <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
            <script src="{{ asset('user/mail/contact.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('user/js/main.js') }}"></script>


            @if (session('notification'))
                <script type="text/javascript">
                    alert(<?php echo json_encode(session('notification')); ?>);
                </script>
            @endif

@yield('js')

</body>

</html>

