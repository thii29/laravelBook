@extends('user.layout.masterpage')
@section('content')
    </div>
    </div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Mã</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($carts as $item)
                            <tr>
                                <td class="align-middle">{{ $item->id }}</td>
                                <td align="center"><img src="img/{{  $item->options['image'] }}" style="width: 60px;" alt="Hình ảnh">
                                    <br> &nbsp; <h6>{{ $item->name }}</h6>
                                </td>
                                <td class="align-middle">{{ number_format($item->price) }} VND</td>
                                <td class="align-middle">
                                    <div class="input-group item-quantity mx-auto" style="width: 100px;"
                                        data-id="{{ $item->id }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quantity" value="{{ $item->qty }}" min="0"
                                            class="form-control form-control-sm bg-secondary text-center">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle item-total"><span>{{  number_format($item->price * $item->qty) }}</span> VND</td>
                                <td class="align-middle">
                                    <form action="{{ route('user.removecart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                    </div>
                    {{-- <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng: </h6>
                            <h6 class="font-weight-medium"><span id="total-cart">{{ Cart::subtotal(0, '.') }}</span> VND</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Giảm giá: </h6>

                            <h6 class="font-weight-medium">%</h6>

                        </div>
                    </div> --}}
                    <div class="card-footer border-secondary bg-transparent">
                        <form action="{{ route('user.checkout') }}" method="post">
                            @csrf
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền: </h5>
                            <h5 class="font-weight-bold"> {{ Cart::subtotal(0,',') }} VND</h5>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                               <label class="font-weight-bold">Nhập mã:</label>
                                <input type="text" name="makm" id="" placeholder="Mã giảm giá" class="form-control p-4 ">
                            </div>

                        </div>
                        @if (session()->has('login'))
                        <button class="btn btn-block btn-primary my-3 py-3">Thanh toán</button>
                        @else
                        <a name="" id="" class="btn btn-block btn-primary my-3 py-3" href="{{ route('user.loginform') }}" role="button">Đăng nhập để thanh toán</a>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection


@section('js')
    <script>
        $(document).on('click', '.btn-minus', function(event) {
            let _this = this;
            let product_id = $(_this).closest('.item-quantity').attr('data-id');
            let qty = $(_this).closest('.item-quantity').find('input[name="quantity"]').val();
            qty = parseInt(qty) - 1;
            if(qty == 0) {
                if(!confirm("Bạn có chắc muốn xóa")){
                    return;
                }
            }
            changeQuantityProductCart(_this, product_id, qty);
        });

        $(document).on('click', '.btn-plus', function(event) {
            event.preventDefault();
            let _this = this;
            let product_id = $(_this).closest('.item-quantity').attr('data-id');
            let qty = $(_this).closest('.item-quantity').find('input[name="quantity"]').val();

            changeQuantityProductCart(_this, product_id, parseInt(qty)+1);
        });

        function changeQuantityProductCart(_this, id, qty) {
            let url_add = '{{ route('add.qty.product') }}';
            $.ajax({
                url: url_add,
                type: 'PUT',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                    id : id,
                    qty : qty
                }
            }).done(function(response) {
                if(response.productCart.length == 0){
                    $(_this).closest('tr').remove();
                }
                $(_this).closest('.item-quantity').find('input[name="quantity"]').val(response.productCart.qty)
                $(_this).closest('tr').find('.item-total span').html((parseFloat(response.productCart.price) * parseInt(response.productCart.qty)).toFixed(2))
                $("#total-cart").html(response.total);
                $("#count-qty-cart").html(response.count_qty);
            }).fail(function(err) {
                let mess = JSON.parse(err.responseText);
                if(mess.text) alert(mess.text);
            });
        }

        $(document).on('click', '.btn-plus', function(event) {

        });
    </script>
@endsection
