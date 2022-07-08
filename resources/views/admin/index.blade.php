@extends('admin.layout.masterpagead')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản lý</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách Admin
                            </div>
                            <div class="card-body">
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
                                            @if (session()->has('dangnhap'))
                                                @if(session('dangnhap')['email']==$a->email)
                                                <td>
                                                    
                                                    <a href="">Chỉnh sửa</a>
                                                </td>
                                                @else
                                                <td><a href="" onclick="return confirm('Không có quyền hạn!')">Chỉnh sửa</a></td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection
