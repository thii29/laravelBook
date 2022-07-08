<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="grid wide">
            <div class="row">
                <div class="col l-12 ">
                    <div class="formClient">
                        <div class="formClient__content">
                            <p class="formClient__file-content">Thông tin cá nhân</p>
                            <p class="formClient__manager-content">Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                            <p><a href="/"class="phone__link"> Quay về trang chủ</a></p>
                        </div>
                        <div class="row form__infor">
                            <div class="col l-12">
                                @foreach ($kh as $k)
                               <form action="" class="form__user">
                                    <div class="name">
                                        <p class="name__text">Họ tên </p>
                                        <input type="text" name="hoten" id="" class="login__input-text" value="{{ $k->hoten }}">
                                    </div>
                                    <div class="email">
                                        <p class="email__add">Email </p>
                                        <input type="email" name="email" id="" class="login__input-text" value="{{ $k->email }}">
                                    </div>
                                    <div class="phone">
                                        <p class="phone__change">Số điện thoại</p>
                                        <input type="tel" name="sdt" id="" class="login__input-text" value="{{  $k->sdt }}">
                                    </div>
                                    <div class="name-shop">
                                        <p class="name-shop__text">Địa chỉ</p>
                                        <input type="text" name="diachi" id="" class="login__input-text" value="{{ $k->diachi }}">
                                    </div>
                                    <div class="sex">
                                        <p class="name-shop__text">Mật khẩu</p>
                                        <input type="password" name="password" id="password" class="login__input-text" value="{{ $k->password }}">
                                        &nbsp;
                                        &nbsp;

                                        <i class="fas fa-eye" onclick="showHide()"></i>
                                    </div>
                                    <div class="date">
                                        <p class="name-shop__text">Danh sách đơn hàng đã mua: </p>
                                        <a href=""class="phone__link"> Xem</a>
                                    </div>
                                    <button type="submit" class="link__save btn btn-primary" >Lưu</button>
                               </form>
                               @endforeach
                            </div>
                            <script>
                                function showHide(){
                                    var input = document.getElementById("password");
                                    if(input.type === "password"){
                                        input.type = "text";
                                    }else input.type = "password";
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
