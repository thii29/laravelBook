@extends('user.layout.masterpage')
@section('content')
</div>
</div>
</div>
</div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng nhập</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đăng nhập</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"> Hãy đăng nhập để thanh toán</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5" >
                <div class="contact-form">
                    <form action="{{ route('user.check') }}"  method="post" novalidate="novalidate" >
                        @csrf
                        <div class="control-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control"  placeholder="Password" name="password" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                           <input type="submit" value="Đăng nhập" class="btn btn-primary py-2 px-4"> &nbsp; &nbsp;
                           <a href="{{ route('user.formreg') }}" class="text-decoration-none">Chưa có tài khoản? Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                @if(session()->has('noti'))
                <div class="alert alert-success">
                    {{ session('noti') }}
                </div>
                @endif
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
