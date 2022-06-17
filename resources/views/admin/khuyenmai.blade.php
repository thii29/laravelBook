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
                                        <td>Phần trăm</td>
                                        <td>Trạng thái</td>
                                        <td colspan="2" align="center">Thao tác</td>
                                    </tr>
                                </tbody>
                                    @foreach ($khuyenmai as $km)
                                    <tr>
                                        <td>{{$km->makm}}</td>
                                        <td>{{$km->tenkm}}</td>
                                        <td>{{$km->phantramgiam}}</td>
                                        <td>{{$km->trangthai}}</td>
                                        <td><a href="{{ route('admin.formsuakm',$km->makm) }}">Sửa</a>|
                                            <form action="{{route('admin.xoakm')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="makm" value="{{$km->makm}}">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="submit" value="Xóa">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                               </table>
                            </div>

                        </div>
                        <div class="card-header">
                            <i class="fa fa-address-book" aria-hidden="true"></i> Thêm mã mới
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.themkm')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputMakm"  type="text" name="makm" placeholder="Mã khuyến mãi" />
                                            <label for="inputMakm">Mã khuyến mãi: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputTenkm" type="text" name="tenkm" placeholder="Tên mã khuyến mãi" />
                                            <label for="inputTenkm">Tên khuyến mãi: </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPhantramgiam" type="text" name="phantramgiam" placeholder="Phần trăm giảm giá" />
                                            <label for="inputPhantramgiam">Phần trăm giảm: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputTrangthai" type="text" name="trangthai" placeholder="Trạng thái" />
                                            <label for="inputTrangthai">Trạng thái: </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn btn-primary btn-block" >Thêm mã mới</button></div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <label for="">* Ghi chú: </label>

                        </div>
                    </div>
                </main>
@endsection
