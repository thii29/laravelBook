@extends('user.layout.masterpage')
@section('content')
</div>
</div>
</div>
</div>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sách</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        @foreach ($detail as $d)
        <form action="{{ route('user.addgiohang') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../img/{{ $d->hinhanh }}" alt="Image" name="hinhanh">
                            <input type="hidden" name="masach" value="{{ $d->masach }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $d->tensach }}</h3>
                <h5 class="font-weight-semi-bold mb-4">Giá: {{ number_format($d->gia) }} vnđ</h5>
                <p class="mb-4">Nhà xuất bản:
                    {{ $d->nhaxb->tennxb }}
                </p>
                @foreach ($tg as $t)
                @if($d->masach == $t->masach)
                <p class="mb-4">Tác giả: {{ $t->tentg }}</p>
                @endif
                @endforeach
                <p class="mb-4">Thể loại: {{ $d->danhmuc->tendm }}</p>
                <p class="mb-4">Số trang: {{ $d->sotrang }}</p>
                <p class="mb-4">Kích thước: {{ $d->kichthuoc }}</p>
                <p class="mb-4">Loại bìa: {{ $d->loaibia }}</p>
                @if ($d->trangthai==1)
                   <p class="mb-4">Tình trạng: còn hàng</p>
                @else
                    <p class="mb-4">Tình trạng: hết hàng </p>
                @endif
                <p class="mb-4">Số lượng: {{ $d->soluongkho }} </p>
                <p class="mb-4">{{ $d->gioithieusach }}</p>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        {{-- <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div> --}}
                        <input type="number" class="form-control bg-secondary text-center" name="soluong" min="1" max="{{ $d->soluongkho }}" value="1">
                        {{-- <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div> --}}
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sách cùng thể loại</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($sach as $s)
                    @foreach ($detail as $de)
                    @if($s->madm == $de->madm)
                    <div class="card product-item border-0">
                        <form action="{{ route('user.addgiohang') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="../img/{{ $s->hinhanh }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $s->tensach }}</h6>
                            <input type="hidden" name="masach" value="{{ $s->masach }}">
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($s->gia) }} VND</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ url('user/detail') }}/{{ $s->masach }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>Chi tiết
                            </a>
                            <input type="hidden" name="soluong" min="1" max="{{ $s->soluongkho }}" value="1" >
                            <button class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                        </div>
                    </form>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="../img/sach02.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->

@endsection
