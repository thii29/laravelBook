@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Điền thông tin tác giả</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                    <form action="{{ route('admin.themtg') }}" method="post">
                                     @csrf
                                     <div class="row mb-3">
                                         <div class="col-md-6">
                                             <div class="form-floating mb-3 mb-md-0">
                                                 <input class="form-control" id="inputID" type="text" name="matg"/>
                                                 <label for="inputID">Mã tác giả: </label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input class="form-control" id="inputName" type="text" name="tentg" />
                                                 <label for="inputName">Tên tác giả: </label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-floating mb-3">
                                        <p>Giới thiệu: </p>
                                        <textarea name="gioithieu" cols="124" rows="5">
                                        </textarea>
                                    </div>
                                     <div class="d-grid">
                                        <input type="submit" value="Thêm" class="btn btn-primary btn-block">
                                     </div>
                                    </form>
                            </div>
                        </div>
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
                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

