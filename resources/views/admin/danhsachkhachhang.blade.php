@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách khách hàng</h1>
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
                                            <td>Mã KH</td>
                                            <td>Họ tên KH</td>
                                            <td Email</td>
                                            <td>Số điện thoại</td>
                                            <td>Địa chỉ</td>
                                        </tr>
                                    </tbody>
                                    {{-- Thêm code hiển thị ở đây --}}
                                    <tbody>
                                        @foreach ($kh as $k)
                                        <tr>
                                            <td>{{ $k->makh }}</td>
                                            <td>{{ $k->hoten }}</td>
                                            <td>{{ $k->email }}</td>
                                            <td>{{ $k->sdt }}</td>
                                            <td>{{ $k->diachi }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="height: 100vh"></div>
                    </div>
                </main>
   @endsection

