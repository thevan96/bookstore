@extends('user.layout')
@section('title', 'Home')

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
    <!-- Start Shop Page -->
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="wn__single__product">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                        <a href="1.jpg"><img src="{{ $book->image }}"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="product__info__main">
                                    <h1>{{ $book->title }}</h1>
                                    <div class="product_meta">
                                        <h3>{{ $book->author }}</h3>
                                    </div>
                                    <br>
                                    <div class="product_meta">
                                        <span class="posted_in">Giá :
                                            <a href="javascript:;">{{ number_format($book->price) }}</a>
                                        </span>
                                    </div>
                                    <div class="product_meta">
                                        <span class="posted_in">Thể loại :
                                            <a href="javascript:;">{{ $genre->name }}</a>
                                        </span>
                                    </div>
                                    <div class="product_meta">
                                        <span class="posted_in">Ngày xuất bản :
                                            <a href="javascript:;">{{ $book->publication_date }}</a>
                                        </span>
                                    </div>
                                    <br>
                                    <div class="box-tocart d-flex">
                                        <div class="addtocart__actions">
                                            <button class="tocart" onclick="addToCart({{ $book->id }})"
                                                title="Add to Cart">Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__info__detailed">
                        <div class="pro_details_nav nav justify-content-start" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Mô tả sách</a>
                        </div>
                        <div class="tab__container">
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                <div class="description__attribute">
                                    {!! $book->description !!}
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
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
            $('#total').text(data.total)
            const carts = Object.keys(data.listCart).map(i => data.listCart[i]);
            $('#list-cart').text('');
            $.each(carts, (i, v) => {
                $('#list-cart').append(
                    `<div class="item01 d-flex">
                        <div class="thumb">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/user/images/product/sm-img/1.jpg') }}"
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
