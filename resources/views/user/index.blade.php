@extends('user.layout.masterpage')
@section('content')
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="../img/banner_1.jpg" alt="">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a> --}}
                    {{-- <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            @foreach ($km as $k)
            @if ($k->trangthai == 1)
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{ $k->makm }}</h5>
                        <h1 class="mb-4 font-weight-semi-bold">{{ $k->tenkm }}</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua sắm ngay</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sách bán chạy</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
                @foreach ($sach as $s)
                @if ($s->banchay ==1)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <form action="{{ route('user.addgiohang') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="masach" value="{{ $s->masach }}">
                        <input type="hidden" name="soluong" min="1" max="{{ $s->soluongkho }}" value="1" >

                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="user/img/{{ $s->hinhanh }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $s->tensach }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($s->gia) }} VND</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ url('user/detail') }}/{{ $s->masach }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                        <button class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                    </div>
                </form>
                </div>
                </div>

                @endif
                @endforeach
        </div>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Tiểu thuyết trinh thám - kinh dị</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

                @foreach ($sach as $s)
                @if ($s->madm == 'ttkd')

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <form action="{{ route('user.addgiohang') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="masach" value="{{ $s->masach }}">
                        <input type="hidden" name="soluong" min="1" max="{{ $s->soluongkho }}" value="1" >
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="user/img/{{ $s->hinhanh }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $s->tensach }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($s->gia) }} VND</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                        <button class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                    </div>
                </form>

                </div>
                </div>

                @endif
                @endforeach

        </div>
    </div>

@endsection
