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
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
            <div class="container">
                <div class="row">

                    <div class="order-2 col-lg-3 col-12 order-lg-1 md-mt-40 sm-mt-40">
                        <div class="shop__sidebar">
                            <aside class="wedget__categories poroduct--cat">
                                <h3 class="wedget__title">Product Categories</h3>
                                <ul>
                                    <li><a href="#">Biography <span>(3)</span></a></li>
                                    <li><a href="#">Business <span>(4)</span></a></li>
                                    <li><a href="#">Cookbooks <span>(6)</span></a></li>
                                    <li><a href="#">Health & Fitness <span>(7)</span></a></li>
                                    <li><a href="#">History <span>(8)</span></a></li>
                                    <li><a href="#">Mystery <span>(9)</span></a></li>
                                    <li><a href="#">Inspiration <span>(13)</span></a></li>
                                    <li><a href="#">Romance <span>(20)</span></a></li>
                                    <li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
                                    <li><a href="#">Self-Improvement <span>(13)</span></a></li>
                                    <li><a href="#">Humor Books <span>(17)</span></a></li>
                                    <li><a href="#">Harry Potter <span>(20)</span></a></li>
                                    <li><a href="#">Land of Stories <span>(34)</span></a></li>
                                    <li><a href="#">Kids' Music <span>(60)</span></a></li>
                                    <li><a href="#">Toys & Games <span>(3)</span></a></li>
                                    <li><a href="#">hoodies <span>(3)</span></a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>

                    <div class="order-1 col-lg-9 col-12 order-lg-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 input-group">
                                    <input type="text" class="form-control" placeholder=" Tìm kiếm">
                                </div>
                                <div
                                    class="flex-wrap shop__list__wrapper d-flex flex-md-nowrap justify-content-between">
                                    <p>Showing 1–12 of 40 results</p>
                                    <div class="orderby__wrapper">
                                        <span>Sort By</span>
                                        <select class="shot__byselect">
                                            <option>Default sorting</option>
                                            <option>HeadPhone</option>
                                            <option>Furniture</option>
                                            <option>Jewellery</option>
                                            <option>Handmade</option>
                                            <option>Kids</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab__container">
                            <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                                <div class="row">
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/1.jpg') }}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/2.jpg') }}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">robin parrish</a></h4>
                                            <ul class="prize d-flex">
                                                <li>$35.00</li>
                                                <li class="old_prize">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                    class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View"
                                                                class="quickview modal-view detail-link"
                                                                href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/1.jpg') }}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/2.jpg') }}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">robin parrish</a></h4>
                                            <ul class="prize d-flex">
                                                <li>$35.00</li>
                                                <li class="old_prize">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                    class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View"
                                                                class="quickview modal-view detail-link"
                                                                href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/1.jpg') }}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/2.jpg') }}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">robin parrish</a></h4>
                                            <ul class="prize d-flex">
                                                <li>$35.00</li>
                                                <li class="old_prize">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                    class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View"
                                                                class="quickview modal-view detail-link"
                                                                href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/1.jpg') }}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1" href="single-product.html"><img
                                                    src="{{ asset('assets/user/images/books/2.jpg') }}"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">robin parrish</a></h4>
                                            <ul class="prize d-flex">
                                                <li>$35.00</li>
                                                <li class="old_prize">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                    class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View"
                                                                class="quickview modal-view detail-link"
                                                                href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <ul class="wn__pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
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
@endsection()

