@extends('admin.layout.masterpagead')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách mã khuyến mãi</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>Danh sách
                            </div>
                            <div class="card-body">
                               <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <td>Mã khuyến mãi</td>
                                        <td>Tên khuyến mãi</td>
                                        <td align="center">Phần trăm</td>
                                        <td align="center">Trạng thái</td>
                                        <td colspan="2" align="center">Thao tác</td>
                                    </tr>
                                </tbody>
                                    @foreach ($khuyenmai as $km)
                                    <tr>
                                        <td>{{$km->makm}}</td>
                                        <td>{{$km->tenkm}}</td>
                                        <td align="center">{{$km->phantramgiam*100}} %</td>
                                        <td align="center">{{$km->trangthai}}</td>
                                        <td align="right">
                                            <a href="{{ route('admin.formsuakm',$km->makm) }}">Sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.xoakm')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="makm" value="{{ $km->makm }}">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="submit" value="Xóa">
                                            </form>
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
                        </div>
                        <div class="card-header">
                            <i class="fa fa-address-book" aria-hidden="true"></i> Thêm mã mới
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.themkm') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputMakm"  type="text" name="makm"  />
                                            <label for="inputMakm">Mã khuyến mãi: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputTenkm" type="text" name="tenkm"  />
                                            <label for="inputTenkm">Tên khuyến mãi: </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPhantramgiam" type="text" name="phantramgiam" />
                                            <label for="inputPhantramgiam">Phần trăm giảm: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputTrangthai" type="text" name="trangthai"  />
                                            <label for="inputTrangthai">Trạng thái: </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn btn-primary">Thêm mã mới</button></div>
                                </div>
                            </form>
                        </div>
                        <div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <label for="">* Ghi chú: </label>
                            <p>1 là trạng thái được hiển thị và được sử dụng</p>
                            <p>0 là trạng thái không được hiển thị và không được sử dụng</p>
                        </div>
                    </div>
                </main>
@endsection
