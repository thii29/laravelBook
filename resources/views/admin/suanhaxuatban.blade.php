@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Sửa thông tin</i> </h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.suanxb') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputManxb" type="text" name="manxb" value="{{ $nxb->manxb }}" readonly/>
                                                <label for="inputManxb">Mã nhà xuất bản</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputTennxb" type="text" name="tennxb" value="{{ $nxb->tennxb }}" />
                                                <label for="inputTennxb">Tên danh mục</label>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Sửa</button></div>
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

