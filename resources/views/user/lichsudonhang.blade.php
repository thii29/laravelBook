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
    <title>Danh sách đơn hàng-{{ session('login')["hoten"] }}</title>
    <style>
        table td{
            border: 0.3px solid;
            border-radius: 3px;
            border-spacing: 0px;
        }
        td{
            text-align: left;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="grid wide">
            <div class="row">
                <div class="col l-12 ">
                    <div class="formClient">
                        <div class="formClient__content">
                            <p class="formClient__file-content">{{ session('login')['hoten'] }} </p>
                            <p class="formClient__file-content">{{ session('login')['email'] }} - {{ session('login')['sdt'] }}</p>
                            <p class="formClient__file-content"><b>Danh sách đơn hàng đã mua</b> </p>

                            <p><a href="{{ route('user.infor',session('login')["email"]) }}"class="phone__link"> Thông tin cá nhân</a></p>
                        </div>
                        <div class="row form__infor" style="padding: 15px">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Mã đơn hàng</td>
                                        <td>Ngày mua</td>
                                        <td>Mã sách</td>
                                        <td>Tên sách</td>
                                        <td>Giá sách</td>
                                        <td>Số lượng</td>
                                        <td>Ghi chú</td>
                                        <td>Tổng đơn</td>
                                        <td>Khuyến mãi</td>
                                        <td>Trạng thái</td>
                                    </tr>
                                    @foreach ($donhang as $dh)
                                    @foreach ($chitiet as $ct)
                                        @if ($ct->mahoadon == $dh->mahoadon)
                                        <tr>
                                            <td >{{ $dh->mahoadon }}</td>
                                            <td>{{ $dh->ngaytao }}</td>
                                            <td>{{ $ct->masach }}</td>
                                            <td>{{ $ct->tensach }}</td>
                                            <td>{{ number_format($ct->giasach) }} VNĐ</td>
                                            <td>{{ $ct->soluongmua }}</td>
                                            <td>
                                                @if($dh->ghichu == NULL)
                                                    Không có ghi chú
                                                @endif
                                                {{ $dh->ghichu }}
                                            </td>
                                            <td>{{ number_format($dh->tongtien) }} VNĐ</td>
                                            <td>
                                                @if($dh->mak == NULL)
                                                    Không sử dụng mã KM
                                                @else
                                                {{ $dh->makm }}

                                                @endif
                                            </td>
                                            <td>
                                                @if($dh->trangthai == 1)
                                                    Đã nhận đơn
                                                @else
                                                Chưa nhận đơn
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
