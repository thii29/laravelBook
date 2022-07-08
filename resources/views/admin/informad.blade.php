@extends('admin.layout.masterpagead')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thông tin cá nhân admin</h1>
            <br>
             @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                 @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                 @endforeach
                 </ul>
             </div>
             @endif
            <div class="card mb-4">
                    @foreach ($admin as $ad)
                    <form action="{{ route('admin.editinform') }}" class="form-control" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="maadmin" value="{{ $ad->maadmin }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Mã: </label>
                            <input class="form-control" type="text" name="maadmin"  value="{{ $ad->maadmin }}" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for="">Họ tên:</label>
                            <input class="form-control" type="text" name="hoten" value="{{ $ad->hoten }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Email: </label>
                            <input class="form-control" type="email" name="email" value="{{ $ad->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Mật khẩu: </label>
                            <input class="form-control" id="pass" type="password" name="password" value="{{ $ad->password }}" required>
                            <span><button class="fa fa-eye" onclick="showHide()"></button></span>
                            <script>
                                function showHide(){
                                    var input=document.getElementById("pass");
                                    if(input.type === "password"){
                                        input.type = "text";
                                    }else input.type = "password";
                                }
                            </script>
                        </div>
                        <div class="col-md-6">
                            <label for="">Phân quyền: </label>
                           <input type="number"  class="form-control" name="phanquyen" id="" value="{{ $ad->phanquyen }}" min="0" max="1">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"><button class="btn btn-primary btn-block" type="submit">Sửa</button></div>
                    </div>
                    </form>
                    @endforeach

            </div>
            <div class="card-body">

            </div>

            <div style="height: 100vh"></div>
        </div>
    </main>
@endsection
