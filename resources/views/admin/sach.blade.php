@extends('admin.layout.masterpagead')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sách</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-light"
                    style="font-size: 14px">
                        <thead>
                            <tr>
                                <td >Mã sách</td>
                                <td>Tên sách</td>
                                <td>Mã danh mục</td>
                                <td>Mã nhà xuất bản</td>
                                <td>Hình ảnh</td>
                                <td>Số lượng kho</td>
                                <td>Thao tác</td>
                            </td>
                        </thead>

                        {{-- Thêm code hiển thị ở đây --}}
                        @foreach ($sach as $s)

                            <tr>
                                <td>{{ $s->masach }}</td>
                                <td>{{ $s->tensach }}</td>
                                <td align="center">{{ $s->madm }}</td>
                                <td align="center">{{ $s->manxb }}</td>
                                <td><img src="../user/img/{{ $s->hinhanh }}" alt="" style="width: 50px"></td>
                                <td align="center">{{ $s->soluongkho }}</td>
                                <td>
                                    Sửa
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
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

            <div style="height: 100vh"></div>
        </div>
    </main>
@endsection
