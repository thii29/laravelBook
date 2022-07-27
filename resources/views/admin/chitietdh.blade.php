@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @foreach ($dh as $d)
                        <form action="{{ route('admin.duyet') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                        <h2 class="mt-4">Chi tiết đơn hàng - {{ $d->mahoadon }}</h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Mã đơn hàng: </label>
                                        <input type="text" class="form-control" name="madh" value="{{ $d->mahoadon }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ngày tạo: </label>
                                        <input type="date" class="form-control" name="ngaytao" value="{{ $d->ngaytao }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Mã khách hàng: </label>
                                        <input type="text" class="form-control" name="makh" value="{{ $d->makh }}" readonly>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Họ tên khách hàng: </label>
                                        <input type="text" name="hotenkh" class="form-control" value="{{ $d->hotenkh }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Số điện thoại: </label>
                                        <input type="tel" name="sdt" class="form-control" value="{{ $d->sdt }}" readonly>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Địa chỉ: </label>
                                        <input type="text" name="diachi" class="form-control" value="{{ $d->diachi }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Mã sách: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Tên sách:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <lable>Số lượng: </lable>
                                    </div>
                                    <div class="col-md-4">
                                        <lable>Giá: </lable>
                                    </div>
                                </div>
                                @foreach ($ctdh as $ct)
                                @if($d->mahoadon == $ct->mahoadon)
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="masach" class="form-control" value="{{  $ct->masach }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="tensach"  class="form-control" value="{{ $ct->tensach }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="soluong" class="form-control" value="{{ $ct->soluongmua }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="gia" class="form-control" value="{{ $ct->giasach }} " readonly>
                                    </div>
                                </div>
                                <br>
                                @endif
                                @endforeach
                                <div class="row">
                                    <div class="col-md-6">
                                        <lable>Mã khuyến mãi: </lable>
                                        <input type="text" name="makm" class="form-control" value="{{ $d->makm }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <lable>Tổng đơn: </lable>
                                        <input type="text" name="tongtien" class="form-control" value="{{ $d->tongtien }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <lable>Ghi chú: </lable>
                                        <input type="text" name="ghichu" class="form-control" value="{{ $d->ghichu }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <lable>Trạng thái:</lable>
                                        <select name="trangthai" class="form-control">
                                            @if($d->trangthai == 0)
                                                <option name="trangthai" value="1">Đã duyệt</option>
                                                <option name="trangthai" value="{{ $d->trangthai }}"selected>Chưa duyệt</option>
                                            @else
                                                 <option name="trangthai" value="0">Chưa duyệt</option>
                                                 <option name="trangthai" value="{{ $d->trangthai }}"selected>Đã duyệt</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row" >
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary col-md-2">Duyệt</button> &nbsp;
                                    <a name="" id="" class="btn btn-primary col-md-2" href="#" role="button">Huỷ</a>
                                </div>
                            </div>
                        </div>
                        </form>
                        @endforeach
                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

