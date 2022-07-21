@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Điền thông tin sách</i></h2>
                        <div class="card-body">
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

                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.themsach') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="inputMasach">Mã sách: </label>
                                            <input class="form-control" id="inputMasach" type="text" name="masach"  />
                                        </div>
                                        <div class="col-md-6">
                                           <label for="inputTensach">Tên sách:</label>
                                           <input class="form-control" id="inputTensach" type="text" name="tensach"  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="inputMadm">Mã danh mục:</label>
                                            <select name="madm" id="inputMadm" class="form-control" >
                                                @foreach ($danhmuc as $d)
                                                <option value="{{ $d->madm }}">
                                                    {{ $d->madm }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputManxb">Mã nhà xuất bản:</label>
                                            <select name="manxb" id="inputManxb"  class="form-control">
                                                @foreach ($nxb as $n)
                                                <option value="{{ $n->manxb }}">
                                                    {{ $n->manxb }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputHinh">Hình ảnh:</label>
                                            <input type="file" name="hinhanh" id="inputHinh" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <lable for="inputSoluong">Số lượng kho:</lable>

                                            <input type="number" class="form-control" name="soluongkho" id="inputSoluong">
                                        </div>
                                        <div class="col-md-3">
                                            <lable for="inputSotrang">Số trang:</lable>
                                            <input type="number" class="form-control" name="sotrang" id="inputSotrang">
                                        </div>
                                        <div class="col-md-3">
                                            <lable for="inputKichthuoc">Kích thước: </lable>
                                            <input type="text" class="form-control" name="kichthuoc" id="inputKichthuoc">
                                        </div>
                                        <div class="col-md-3">
                                            <lable for="inputLoaibia">Loại bìa: </lable>
                                            <input type="text" class="form-control" name="loaibia" id="inputLoaibia">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="inputGioithieu">Giới thiệu: </label>
                                            <textarea name="gioithieu" id="" cols="85" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="inputGia">Giá</label>
                                            <input type="text" class="form-control" name="gia" id="inputGia">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Bán chạy: </label>
                                            <select name="banchay" id="" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Trạng thái: </label>
                                            <select name="trangthai" id=""class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="mt-4"><i>Thuộc tác giả: </i></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <lable>Mã tác giả: </lable>
                                            <input type="text" name="matg" id="" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <lable>Tên tác giả: </lable>
                                            <input type="text" name="tentg" id="" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12"><a href="{{ route('admin.tg') }}" target="_blank">Xem danh sách tác giả tại đây</a></div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Thêm sách mới</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div style="height: 100pt"></div>
                    </div>
                </main>
               @endsection

