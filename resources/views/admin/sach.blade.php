@extends('admin.layout.masterpagead')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sách</h1>
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
            <!-- Navbar Search-->
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <form action="{{ route('admin.sach') }}" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="text" name="keyword" placeholder="Nhập tên sách cần tìm..." />
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Navbar-->
            <br>
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
                                <td colspan="2">Thao tác</td>
                            </td>
                        </thead>
                        {{-- Thêm code hiển thị ở đây --}}
                        @foreach ($sach as $s)
                            <tr>
                                <td>{{ $s->masach }}</td>
                                <td>{{ $s->tensach }}</td>
                                <td align="center">{{ $s->madm }}</td>
                                <td align="center">{{ $s->manxb }}</td>
                                <td><img src="../user/img/{{ $s->hinhanh }}" alt="Lỗi hình rồi!" style="width: 50px"></td>
                                <td align="center">{{ $s->soluongkho }}</td>
                                <td>
                                    <a href="{{route('admin.formsuasach',$s->masach)}}" class="btn btn-primary">Sửa </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.xoasach') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="masach" value="{{ $s->masach }}">
                                        <button class="btn btn-primary"> Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>


            <div style="height: 100vh"></div>
        </div>
    </main>
@endsection
