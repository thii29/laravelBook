@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Điền thông tin</i> </h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.themnxb')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputManxb" type="text" name="manxb" />
                                                <label for="inputManxb">Mã nhà xuất bản</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputTennxb" type="text" name="tennxb" />
                                                <label for="inputTennxb">Tên danh mục</label>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Thêm nhà xuất bản</button></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <label for="note">* Ghi chú:</label> --}}
                            {{-- cái phần dưới này để hiển thị validate hoặc lỗi: vd như trùng mã, trùng tên, --}}
                            {{-- chưa điền mã hoặc tên,... --}}
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
                        <div style="height: 100pt"></div>
                    </div>
                </main>
    @endsection

