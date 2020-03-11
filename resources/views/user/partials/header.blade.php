<!-- Header -->
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                <div class="logo">
                    <a href="{{ route('home.index')}}">
                        <img src="{{ asset('assets/user/images/logo/logo.png') }}" alt="logo images">
                    </a>
                </div>
            </div>

            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    {{-- <ul class="meninmenu d-flex justify-content-start"> --}}
                    {{--     <li class="drop with--one--item"><a href="index.html">Home</a></li> --}}
                    {{--     <li class="drop"><a href="#">Shop</a> --}}
                    {{--         <div class="megamenu mega03"> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Shop Layout</li> --}}
                    {{--                 <li><a href="shop-grid.html">Shop Grid</a></li> --}}
                    {{--                 <li><a href="single-product.html">Single Product</a></li> --}}
                    {{--             </ul> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Shop Page</li> --}}
                    {{--                 <li><a href="my-account.html">My Account</a></li> --}}
                    {{--                 <li><a href="cart.html">Cart Page</a></li> --}}
                    {{--                 <li><a href="checkout.html">Checkout Page</a></li> --}}
                    {{--                 <li><a href="wishlist.html">Wishlist Page</a></li> --}}
                    {{--                 <li><a href="error404.html">404 Page</a></li> --}}
                    {{--                 <li><a href="faq.html">Faq Page</a></li> --}}
                    {{--             </ul> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Bargain Books</li> --}}
                    {{--                 <li><a href="shop-grid.html">Bargain Bestsellers</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Activity Kits</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">B&N Classics</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Books Under $5</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Bargain Books</a></li> --}}
                    {{--             </ul> --}}
                    {{--         </div> --}}
                    {{--     </li> --}}
                    {{--     <li class="drop"><a href="shop-grid.html">Books</a> --}}
                    {{--         <div class="megamenu mega03"> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Categories</li> --}}
                    {{--                 <li><a href="shop-grid.html">Biography </a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Business </a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Cookbooks </a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Health & Fitness </a></li> --}}
                    {{--                 <li><a href="shop-grid.html">History </a></li> --}}
                    {{--             </ul> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Customer Favourite</li> --}}
                    {{--                 <li><a href="shop-grid.html">Mystery</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Religion & Inspiration</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Romance</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Fiction/Fantasy</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Sleeveless</a></li> --}}
                    {{--             </ul> --}}
                    {{--             <ul class="item item03"> --}}
                    {{--                 <li class="title">Collections</li> --}}
                    {{--                 <li><a href="shop-grid.html">Science </a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Fiction/Fantasy</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Self-Improvemen</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Home & Garden</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Humor Books</a></li> --}}
                    {{--             </ul> --}}
                    {{--         </div> --}}
                    {{--     </li> --}}
                    {{--     <li class="drop"><a href="shop-grid.html">Kids</a> --}}
                    {{--         <div class="megamenu mega02"> --}}
                    {{--             <ul class="item item02"> --}}
                    {{--                 <li class="title">Top Collections</li> --}}
                    {{--                 <li><a href="shop-grid.html">American Girl</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Diary Wimpy Kid</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Finding Dory</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Harry Potter</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Land of Stories</a></li> --}}
                    {{--             </ul> --}}
                    {{--             <ul class="item item02"> --}}
                    {{--                 <li class="title">More For Kids</li> --}}
                    {{--                 <li><a href="shop-grid.html">B&N Educators</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">B&N Kids' Club</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Kids' Music</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Toys & Games</a></li> --}}
                    {{--                 <li><a href="shop-grid.html">Hoodies</a></li> --}}
                    {{--             </ul> --}}
                    {{--         </div> --}}
                    {{--     </li> --}}
                    {{--     <li class="drop"><a href="#">Pages</a> --}}
                    {{--         <div class="megamenu dropdown"> --}}
                    {{--             <ul class="item item01"> --}}
                    {{--                 <li><a href="about.html">About Page</a></li> --}}
                    {{--                 <li class="label2"><a href="portfolio.html">Portfolio</a> --}}
                    {{--                     <ul> --}}
                    {{--                         <li><a href="portfolio.html">Portfolio</a></li> --}}
                    {{--                         <li><a href="portfolio-details.html">Portfolio Details</a></li> --}}
                    {{--                     </ul> --}}
                    {{--                 </li> --}}
                    {{--                 <li><a href="my-account.html">My Account</a></li> --}}
                    {{--                 <li><a href="cart.html">Cart Page</a></li> --}}
                    {{--                 <li><a href="checkout.html">Checkout Page</a></li> --}}
                    {{--                 <li><a href="wishlist.html">Wishlist Page</a></li> --}}
                    {{--                 <li><a href="error404.html">404 Page</a></li> --}}
                    {{--                 <li><a href="faq.html">Faq Page</a></li> --}}
                    {{--                 <li><a href="team.html">Team Page</a></li> --}}
                    {{--             </ul> --}}
                    {{--         </div> --}}
                    {{--     </li> --}}
                    {{--     <li class="drop"><a href="blog.html">Blog</a> --}}
                    {{--         <div class="megamenu dropdown"> --}}
                    {{--             <ul class="item item01"> --}}
                    {{--                 <li><a href="blog.html">Blog Page</a></li> --}}
                    {{--                 <li><a href="blog-details.html">Blog Details</a></li> --}}
                    {{--             </ul> --}}
                    {{--         </div> --}}
                    {{--     </li> --}}
                    {{--     <li><a href="contact.html">Contact</a></li> --}}
                    {{-- </ul> --}}
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
