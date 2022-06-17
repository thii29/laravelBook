@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><i>Điền thông tin</i> </h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.themdm')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputMadm" type="text" name="madm" placeholder="Mã danh mục" />
                                                <label for="inputMadm">Mã danh mục</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputTendm" type="text" name="tendm" placeholder="Tên danh mục" />
                                                <label for="inputTendm">Tên danh mục</label>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Thêm danh mục mới</button></div>
                                        </div>
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

