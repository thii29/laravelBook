@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Sửa khuyến mãi</i> </h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.suakm') }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputMakm"  type="text" name="makm"
                                                value="{{ $khuyenmai->makm }}" placeholder="Mã khuyến mãi" readonly/>
                                                <label for="inputMakm">Mã khuyến mãi: </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputTenkm" type="text" name="tenkm"
                                                value="{{ $khuyenmai->tenkm }}" placeholder="Tên mã khuyến mãi" />
                                                <label for="inputTenkm">Tên khuyến mãi: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPhantramgiam" type="text" name="phantramgiam"
                                                value="{{ $khuyenmai->phantramgiam }}" placeholder="Phần trăm giảm giá" />
                                                <label for="inputPhantramgiam">Phần trăm giảm: </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputTrangthai" type="text" name="trangthai"
                                                value="{{ $khuyenmai->trangthai }}" placeholder="Trạng thái" />
                                                <label for="inputTrangthai">Trạng thái: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-primary btn-block" >Sửa khuyến mãi</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="note">* Ghi chú:</label>
                            {{-- cái phần dưới này để hiển thị validate hoặc lỗi: vd như trùng mã, trùng tên, --}}
                            {{-- chưa điền mã hoặc tên,... --}}
                        </div>
                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

