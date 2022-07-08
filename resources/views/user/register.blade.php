@extends('user.layout.masterpage')
@section('content')
</div>
</div>
</div>
</div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng Ký</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đăng ký</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"> Tạo tài khoản</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5" >
                <div class="contact-form">
                    <form action="{{ route('user.dangky') }}"  method="post" novalidate="novalidate" >
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control" placeholder="Họ & tên" name="hoten" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="tel" class="form-control" placeholder="Số diện thoại" name="sdt" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control"  placeholder="Password" name="password" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                           <input type="submit" value="Đăng ký" class="btn btn-primary py-2 px-4">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                @if(session()->has('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif
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
        </div>
    </div>
    <!-- Contact End -->


  @endsection
