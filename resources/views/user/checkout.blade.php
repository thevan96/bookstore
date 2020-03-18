@extends('user.layout')

@section('title', 'Checkout')

@section('css')
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/user/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/user/images/icon.png') }}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/style.css') }}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('assets/user/js/vendor/modernizr-3.5.0.min.js') }}"></script>

@endsection()

@section('content')
    <section class="wn__checkout__area section-padding--lg bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wn_checkout_wrap">
                        @guest
                            <div class="checkout_info">
                                <a class="showlogin" href="#">Nếu đã có tài khoản</a>
                            </div>
                            <div class="checkout_login">
                                <form class="wn__checkout__form" action=" {{ route('cart.login') }}" method="post">
                                    @csrf
                                    <div class="input__box form-group">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="input__box form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input id="password" name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form__btn">
                                        <button>Đăng nhập</button>
                                        <label class="label-for-checkbox">
                                            <input id="rememberme" name="rememberme" value="forever" type="checkbox">
                                            <span>Remember me</span>
                                        </label>
                                        <a href="#">Mất tài khoản</a>
                                    </div>
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="customer_details">
                        <h3>Chi tiết thanh toán</h3>
                        <div class="customar__field">
                            <form method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <div class="input_box form-group">
                                    <label for="full_name">Họ và tên<span>*</span></label>
                                    <input type="text" name="name" id="full_name"
                                        value="{{ old('name', Auth::user()->name ?? '') }}"
                                        class="form-control @error('name') is-invalid @enderror" size="50" value="">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input_box form-group">
                                    <label for="address">Địa chỉ nhận hàng<span>*</span></label>
                                    <input type="text" name="address" id="address"
                                        value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror" size="50">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input_box form-group">
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="" name="notes"
                                        cols="60" rows="5" placeholder="Ghi chú khác">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="margin_between form-group">
                                    <div class="input_box space_between">
                                        <label for="phone">Số điện thoại <span>*</span></label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror" size="30"
                                            value="{{ old('phone', Auth::user()->phone ?? '') }}">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="input_box space_between form-group">
                                        <label for="email-account">Email <span>*</span></label>
                                        <input type="email" name="email-account" id="email-account"
                                            class="form-control @error('email') is-invalid @enderror" size="30"
                                            value="{{ old('email-account', Auth::user()->email ?? '') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                @guest
                                    <div class="create__account">
                                        <div class="wn__accountbox">
                                            <input class="input-checkbox" id="create-account" name="create-account"
                                                type="checkbox" value="0">
                                            <label>Tạo tài khoản</label>
                                        </div>
                                        <div class="account__field">
                                            <div class="form-group">
                                                <label for="password-account">Mật khẩu tài khoản</label>
                                                <input type="password" id="password-account" name="password-account"
                                                    placeholder="Mật khẩu" value="{{ old('password-account') }}"
                                                    class="form-control @error('password-account') is-invalid @enderror">
                                                @error('password-account')
                                                <p class="text-danger">
                                                    <i class="fa fa-times" aria-hidden="true"></i>{{ $message }}
                                                </p>
                                                @enderror
                                                <label type="repeat-password">Nhập lại mật khẩu</label>
                                                <input type="password" id="repeat-password-account"
                                                    name="repeat-password-account" placeholder="Nhập lại mật khẩu"
                                                    value="{{ old('repeat-password-account') }}"
                                                    class="form-control @error('repeat-password-account') is-invalid @enderror">
                                                @error('repeat-password-account')
                                                <p class="text-danger">
                                                    <i class="fa fa-times" aria-hidden="true"></i>{{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endguest
                                <br>
                                @if (Cart::count() > 0)
                                    <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__order__box">
                        <h3 class="onder__title">Đơn hàng của bạn</h3>
                        <ul class="order__total">
                            <li>Sản phẩm</li>
                            <li>Tiền</li>
                        </ul>
                        <ul class="order_product">
                            {{-- Danh sach don hang --}}
                            @foreach (Cart::content() as $cart)
                                <li>{{ $cart->name }} x {{ $cart->qty }}<span>{{ $cart->price * $cart->qty }}</span></li>
                            @endforeach
                        </ul>
                        <ul class="total__amount">
                            <li>Tổng giá trị đơn hàng <span>{{ Cart::total() }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()

@section('js')
    <script src="{{ asset('assets/user/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/user/js/active.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>

    @routes
    <script>
        const addToCartAjax = id => {
            return $.ajax({
                method: 'get',
                url: route('cart.addToCart', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const removeCartAjax = id => {
            return $.ajax({
                method: 'delete',
                url: route('cart.removeCart', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const initCartAjax = id => {
            return $.ajax({
                method: 'get',
                url: route('cart.initCart'),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const setData = data => {
            $('#quantity').text(data.quantity)
            $('#total-header').text(data.total)

            const carts = Object.keys(data.listCart).map(i => data.listCart[i]);
            $('#list-cart').text('');
            $.each(carts, (i, v) => {
                $('#list-cart').append(
                    `<div class="item01 d-flex">
                        <div class="thumb">
                            <a href="product-details.html"><img src="${v.options.image}" alt="product images"></a>
                        </div>
                        <div class="content">
                            <h6><a href="product-details.html">${v.name}</a></h6>
                            <span class="prize">${v.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')} vnd</span>
                            <div class="product_prize d-flex justify-content-between">
                                <ul class="d-flex justify-content-end">
                                    <li><a onclick="removeCart('${v.rowId}')"><i class="zmdi zmdi-delete"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br> `
                );
            });
        };

        const removeCart = id => {
            removeCartAjax(id).done(result => {
                console.log(result);
                drawCart();
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const drawCart = () => {
            initCartAjax().done(data => {
                setData(data);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        @if(Session::has('login-fail'))
            $.notify({
                message: "{{ Session::get('login-fail') }}"
            }, {
                type: 'success'
            });

        @endif
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            drawCart();
        });

    </script>
@endsection()
