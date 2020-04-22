<!-- Header -->
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                <div class="logo">
                    <a href="{{ route('home.index')}}">
                        {{-- <h2 style="color:white;">Book Store</h2> --}}
                        {{-- <h4>World of book</h4> --}}
                        <img src="{{ asset('assets/user/images/logo/book.svg') }}" alt="" width="40px" height="40px">
                    </a>
                </div>
            </div>

            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                </nav>
            </div>

            <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun" id="quantity"></span></a>

                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="micart__close">
                                    <span>close</span>
                                </div>
                                <div class="text-right total_amount">
                                    <span id="total-header"></span>
                                </div>
                                <div class="single__items">
                                    <div class= "miniproduct" data-spy="scroll" id="list-cart">
                                        {{-- List item --}}
                                    </div>
                                </div>
                                <div>
                                    <div class="mini_action cart">
                                        <a class="cart__btn" href="{{ route('home.carts') }}">Xem và chỉnh sửa giỏ hàng</a>
                                    </div>
                                    <div class="mini_action cart">
                                        <a class="cart__btn" href="{{ route('cart.checkout') }}">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Shopping Cart -->

                    </li>
                    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                        <div class="searchbar__content setting__block">
                            <div class="content-inner">
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>Tài khoản</span>
                                    </strong>
                                    @guest
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                <span><a href="{{ route('login') }}">Đăng nhập</a></span>
                                                <span><a href="{{ route('register') }}">Tạo tài khoản</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endguest
                                    @auth
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                <span><a href="#">Thông tin cá nhân</a></span>
                                                <span><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></span>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- //Header -->

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area img-fluid"style="background-image: url('https://www.rd.com/wp-content/uploads/2017/10/This-Is-How-Long-It-Takes-To-Read-The-Whole-Dictionary_509582812-Billion-Photos_FB-e1574101045824.jpg')
; height:600px;">
</div>
<!-- End Bradcaump area -->
