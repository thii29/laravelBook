@extends('user.layout.masterpage')
@section('content')
</div>
</div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin khách hàng</h4>
                    <form action="{{ route('user.dathang') }}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input class="form-control" type="text" placeholder="Họ tên" name="hoten" value="{{ session('login')['hoten'] }}">
                            <input type="hidden" name="makh" value="{{ session('login')['makh'] }}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="email" value="{{ session('login')['email'] }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+084" name="sdt" value="{{ session('login')['sdt'] }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="Địa chỉ" name="diachi" value="{{  session('login')['diachi'] }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Ngày đặt: </label>
                            <input type="date" class="form-control"  name="ngaydat" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label >Ghi chú</label>
                            <textarea name="ghichu" id="" cols="86" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        @foreach ($carts as $item)
                        <div class="d-flex justify-content-between">
                            <p>{{ $item->name }}x{{ $item->qty }}</p>
                            <p>{{ number_format($item->price*$item->qty) }} VND</p>
                            <input type="hidden" name="masach" value="{{ $item->id }}"><br>
                            <input type="hidden" name="tensach" value="{{ $item->name }}"><br>
                            <input type="hidden" name="soluong" value="{{ $item->qty }}"><br>
                            <input type="hidden" name="giasach" value="{{ $item->price }}"><br>
                        </div>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between  mb-3 pt-1">
                            <h6 class="font-weight-medium">Giảm giá: </h6>
                            @foreach ($km as $k)
                            <h6 class="font-weight-medium">
                                <input type="hidden" name="makm" value="{{ $k->makm }}">
                                <input type="hidden" name="phantramgiam" value="{{ $k->phantramgiam }}">
                                {{ $k->phantramgiam }} %
                            </h6>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tổng tiền: </h6>
                            <h6 class="font-weight-medium">
                                {{ number_format($subtotal) }} VND
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            @foreach ($km as $k)
                            <h5 class="font-weight-bold">Tổng đơn hàng: </h5>
                                <h5 class="font-weight-bold">
                                <?php
                                 $discount=100-($k->phantramgiam);
                                 $total = ($subtotal)*($discount/100);
                                 //var_dump($k->makm);
                                 ?>
                                 @if ($k->makm != NULL)
                                    {{ number_format($total) }} VND
                                 @else
                                    {{ number_format($subtotal) }} VND
                                 @endif
                                </h5>
                            @endforeach
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
