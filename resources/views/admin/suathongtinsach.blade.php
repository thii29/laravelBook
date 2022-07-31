@extends('admin.layout.masterpagead')
@section( 'content')
@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Sửa thông tin</i></h2>
                        <div class="card mb-4">
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
                            <div class="card-body">
                                <form action="{{ route('admin.suasach') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="">Mã sách: </label>
                                            <input type="text" name="masach" class="form-control" value="{{ $book->masach }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tên sách:</label>
                                            <input type="text" name="tensach" class="form-control" value="{{ $book->tensach }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Danh mục: </label>
                                            <select name="madm" id="" class="form-control">
                                                @foreach ($danhmuc as $dm)
                                                    @if ($dm->madm == $book->madm)
                                                        <option value="{{ $dm->madm }}" selected>{{ $dm->tendm }}</option
                                                    @endif
                                                    <option value="{{ $dm->madm }}">{{ $dm->tendm }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="">Nhà xuất bản: </label></label>
                                            <select name="manxb" id="" class="form-control">
                                                @foreach ($nxb as $n)
                                                    @if ($dm->manxb == $book->manxb)
                                                        <option value="{{ $dm->manxb }}" selected>{{ $dm->tendm }}</option
                                                    @endif
                                                    <option value="{{ $n->manxb }}">{{ $n->tennxb }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Số lượng: </label>
                                            <input type="text" class="form-control" name="soluongkho" value="{{ $book->soluongkho }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Số trang: </label>
                                            <input type="number" class="form-control" name="sotrang" value="{{ $book->sotrang }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Kích thước: </label>
                                            <input type="text" class="form-control" name="kichthuoc" value="{{ $book->kichthuoc }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Loại bìa: </label>
                                            <input type="text" name="loaibia"  class="form-control" value="{{ $book->loaibia }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Giá: </label>
                                            <input type="text" name="gia"  class="form-control" value="{{ $book->gia }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Hình ảnh: </label>
                                            <input type="file" name="hinhanh" class="form-control"
                                             value="{{ $book->hinanh }}" accept=".jpg, .jpeg, .png, .gif">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Giới thiệu: </label>
                                            <textarea name="gioithieu" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Bán chạy: </label>
                                            <select name="" id="" name="banchay" class="form-control">
                                                @if ($book->banchay == 1)
                                                <option value="1" selected>{{ $book->banchay }}</option>
                                                <option value="0">0</option>
                                                @else
                                                <option value="0" selected>{{ $book->banchay }}</option>
                                                <option value="1">1</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Trạng thái:</label>
                                            <select name="" id="" name="trangthai" class="form-control">
                                                @if ($book->trangthai == 1)
                                                <option value="1" selected>Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                                @else
                                                <option value="1">Còn hàng</option>
                                                <option value="0" selected>Hết hàng</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Tác giả:</label>
                                            <select name="matg" id="" class="form-control">
                                               @foreach ($chitiet as $ct)
                                                    @if($ct->matg == $book->matg)
                                                        <option value="{{ $ct->matg }}" selected>{{ $ct->matg }}</option>
                                                    @endif
                                                    <option value="{{ $ct->matg }}">{{ $ct->matg }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <select name="tentg" id="" class="form-control">
                                                @foreach ($chitiet as $ct)
                                                    @if($ct->matg == $book->matg)
                                                        <option value="{{ $ct->tentg }}" selected>{{ $ct->matg }}-{{ $ct->tentg }}</option>
                                                    @endif
                                                        <option value="{{ $ct->tentg }}">{{ $ct->matg }}-{{ $ct->tentg }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Sửa thông tin sách</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection


@endsection

