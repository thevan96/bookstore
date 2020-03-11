@extends('user.layout')
@section('title', 'ListCart')

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
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <form action="#">
                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Sách</th>
                                        <th class="product-price">Giá tiền</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody id="table-carts">
                                </tbody>
                            </table>
                        </div>
                    </form>
                    @if(Cart::count() > 0)
                        <div class="cartbox__btn">
                            <ul class="flex-wrap cart__btn__list d-flex flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="{{ route('cart.checkout') }}">Thanh toán</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        <div class="cartbox-total d-flex justify-content-between">
                            <ul class="cart__total__list">
                                <li>Tổng tiền</li>
                            </ul>
                            <ul class="cart__total__tk">
                                <li id="total-carts">{{ Cart::total() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        const updateAjax = (rowId, quantity) => {
            return $.ajax({
                method: 'put',
                url: route('cart.update', rowId),
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    'quantity': quantity
                }),
            });
        };

        const tableCarts = data => {
            const carts = Object.keys(data.listCart).map(i => data.listCart[i]);
            $('#table-carts').text('');
            $.each(carts, (i, v) => {
                $('#table-carts').append(
                    ` <tr>
                                <td class="product-thumbnail"><a href="#"><img src="${v.options.image}" alt="product img" style="width:80px; height:100px;"></a></td>
                                <td class="product-name"><a href="#">${v.name}</a></td>
                                <td class="product-price"><span class="amount" id="price-${i}">${v.price}</span></td>
                                <td class="product-quantity"><input type="number" value="${v.qty}" onchange="updatePrice(this, ${i}, '${v.rowId}');" min="1" max="${v.options.available_quantity}"></td>
                                <td class="product-subtotal" id="price-each-${i}">${v.price * v.qty}</td>
                                <td class="product-remove"><a onclick="removeCart('${v.rowId}')">X</a></td>
                            </tr> `
                );
            });
        };

        const updatePrice = (obj, index, rowId) => {
            quantity = parseInt(obj.value);
            updateAjax(rowId, quantity).done(result => {
                setData(result);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
            priceEach = parseInt($(`#price-${index}`).text());
            $(`#price-each-${index}`).text(quantity * priceEach);
        };

        const setData = data => {
            $('#quantity').text(data.quantity);
            $('#total-header').text(data.total);
            $('#total-carts').text(data.total);
            const carts = Object.keys(data.listCart).map(i => data.listCart[i]);
            $('#list-cart').text('');
            $.each(carts, (i, v) => {
                $('#list-cart').append(
                    `<div class="item01 d-flex">
                            <div class="thumb">
                                <a href="product-details.html"><img
                                        src="${v.options.image}"
                                        alt="product images"></a>
                            </div>
                            <div class="content">
                                <h6><a href="product-details.html">${v.name}</a></h6>
                                <span class="prize">${v.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')}</span>
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

        const addToCart = id => {
            addToCartAjax(id).done(result => {
                drawCart();
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const removeCart = id => {
            removeCartAjax(id).done(result => {
                drawCart();
                updatePrice();
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const drawCart = () => {
            initCartAjax().done(data => {
                tableCarts(data);
                setData(data);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            drawCart();
        });

    </script>
@endsection()
