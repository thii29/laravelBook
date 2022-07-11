@extends('user.layout.masterpage')
@section('content')
</div>
</div>
</div>
</div>
</div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Tủ sách</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Nhà xuất bản</h5>
                    <form>
                       @foreach ($nxb as $n)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <label  for="">Nhà xuất bản {{ $n->tennxb }}</label>
                            <span class="badge border font-weight-normal">{{ count($n->sach) }}</span>
                        </div>
                       @endforeach
                    </form>
                </div>
                <!-- Price End -->
                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Tác giả</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('user.shop') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="key" class="form-control" placeholder="Tìm kiếm bằng tên sách">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <button class="btn btn-sm text-dark"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @foreach ($sach as $s)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <form action="{{ route('user.addgiohang') }}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="img/{{ $s->hinhanh }}" alt="" name="hinhanh">
                                    <input type="hidden" name="masach" value="{{ $s->masach }}">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $s->tensach }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ number_format($s->gia) }} VND</h6>
                                    </div>
                                    <input type="hidden" name="soluong" min="1" max="{{ $s->soluongkho }}" value="1" >
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ url('user/detail') }}/{{ $s->masach }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <button class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach

                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            {{ $sach->links() }}
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
