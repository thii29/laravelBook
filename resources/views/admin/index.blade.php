@extends('admin.layout.masterpagead')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản lý</h1>
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="card-body">
                            <label for=""><i>* Ghi chú:</i></label>
                            <p>0: nhân viên <br> 1: là admin hệ thống <br> 2: quản lý cửa hàng</p>

                         </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách Admin
                            </div>
                            <div class="card-body">
                                @if (session()->has('dangnhap'))
                                <table class="table table-light">
                                    <tbody>
                                        <tr>
                                            <td>Mã Admin</td>
                                            <td>Họ tên</td>
                                            <td>Email</td>
                                            <td align="center">Phân quyền</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </tbody>
                                    @foreach ($admin as $a)
                                        <tr>
                                            <td>{{ $a->maadmin }}</td>
                                            <td>{{ $a->hoten }}</td>
                                            <td>{{ $a->email }}</td>
                                            <td align="center">{{ $a->phanquyen }}</td>
                                            <td align="center">
                                                @if(session('dangnhap')["phanquyen"] == 1)
                                                <a href="{{ route('admin.inforID', $a->maadmin) }}">Chỉnh sửa</a>
                                                @else
                                                <p>---</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @else
                                    Hãy đăng nhập để xem danh sách
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
@endsection
