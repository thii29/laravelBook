@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Đơn hàng</h1>
                        <div class="card-body">
                            @if(session()->has('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                            @endif
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-light">
                                    <tbody >
                                        <tr>
                                            <td>Mã đơn hàng</td>
                                            <td>Mã khách hàng</td>
                                            <td>Họ tên KH</td>
                                            <td>Ngày tạo</td>
                                            <td>SĐT</td>
                                            <td>Địa chỉ</td>
                                            <td>Mã khuyến mãi</td>
                                            <td>Tổng tiền</td>
                                            <td>Ghi chú</td>
                                            <td>Trạng thái</td>
                                            <td>Duyệt đơn</td>
                                        </tr>
                                    </tbody>
                                    {{-- Thêm code hiển thị ở đây --}}
                                   @foreach ($donhang as $dh)
                                    <tr>
                                            <td>{{ $dh->mahoadon }}</td>
                                            <td>{{ $dh->makh }}</td>
                                            <td>{{ $dh->hotenkh }}</td>
                                            <td>{{ $dh->ngaytao }}</td>
                                            <td>{{ $dh->sdt }}</td>
                                            <td>{{ $dh->diachi }}</td>
                                            <td>{{ $dh->makm }}</td>
                                            <td>{{ $dh->tongtien }}</td>
                                            <td>{{ $dh->ghichu }}</td>
                                            <td>{{ $dh->trangthai }}</td>
                                            <td>
                                               <a href="{{ route('admin.chitietdh',$dh->mahoadon) }}">Duyệt</a>
                                            </td>
                                    </tr>
                                   @endforeach
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

