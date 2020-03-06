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
                            <h3 class="wedget__title">Thể loại sách</h3>
                            <ul>
                                <li><a href="{{ route('home.index') }}">Tất cả thể loại <span>{{ $total }}</span></a></li>
                                @foreach ($genres as $genre)
                                    <li>
                                        <a
                                            href="{{ route('home.genre', ['id' => $genre->id]) }}">{{ $genre->name }}<span>({{ $genre->books->count() }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>

                <div class="order-1 col-lg-9 col-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('home.search') }}" method="POST">
                                <div class="mb-3 input-group">
                                    @csrf
                                    <input name="keyword" type="text" class="form-control"
                                        placeholder="Nhập tên, tác giả sách cần tìm ...." value="{{ old('keyword') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary" type="button">Tìm
                                            kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row draw-data">
                                @if (count($books) !== 0)
                                    @foreach ($books as $book)
                                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product__thumb">
                                                <a class="first__img" href="javascript:;" style="width: 270px; height: 340px;">
                                                    <img src="{{ $book->image }}" alt="product image">
                                                </a>
                                                @if ($book->sale !== 0)
                                                    <div class="hot__box">
                                                        <span class="hot-label">{{ $book->sale }} %</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product__content content--center">
                                                <h4><a href="single-product.html">{{ $book->title }}</a></h4>
                                                <ul class="prize d-flex">
                                                    <li>{{ number_format($book->price - $book->price * ($book->sale / 100), 3) }}
                                                    </li>
                                                    <li class="old_prize">{{ $book->price }}</li>
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="wishlist" onclick="addToCart({{ $book->id }})"><i
                                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                                            <li><a title="Chi tiết" class="quickview modal-view detail-link"
                                                                    href="{{ route('home.show', ['id' => $book->id]) }}">
                                                                    <i class="bi bi-search"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End --}}
                                    @endforeach
                                @else
                                    <div>
                                        <p>
                                            Không tìm thấy kết quả nào phù hợp với từ khóa của bạn
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <ul class="wn__pagination">
                                {{ $books->links() }}
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
                                    <a href="product-details.html"><img
                                            src="${v.options.image}"
                                            alt="product images"></a>
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

        @if(Session::has('success'))
            $.notify({
                message: '{{ Session::get('success') }}'
            }, {
                type: 'success'
            });
        @endif

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Access-Control-Allow-Origin': 'https://app-book-store.herokuapp.com/'
                }
            });
            drawCart();
        });

    </script>
@endsection()
