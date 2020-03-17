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
                                <li><a href="javascript:;" onclick="getBookAll(1)">Tất cả thể loại <span>({{ $total }})</span></a></li>
                                @foreach ($genres as $genre)
                                    <li>
                                        <a href="javascript:;"
                                            onclick="getBookGenre({{ $genre->id }})">{{ $genre->name }}<span>({{ $genre->books->count() }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>

                <div class="order-1 col-lg-9 col-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-3 input-group">
                                    <input id="keyword" name="keyword" type="text" class="form-control"
                                        placeholder="Nhập tên, tác giả sách cần tìm ...." value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row" id="draw-book"></div>
                            <ul class="wn__pagination" id="paginate-book">
                                {{-- <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> --}}
                                {{-- <li class="active"><a href="#">1</a></li> --}}
                                {{-- <li><a href="#">2</a></li> --}}
                                {{-- <li><a href="#">3</a></li> --}}
                                {{-- <li><a href="#">4</a></li> --}}
                                {{-- <li><a href="#">5</a></li> --}}
                                {{-- <li><a href="#">6</a></li> --}}
                                {{-- <li><a href="#">7</a></li> --}}
                                {{-- <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> --}}
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

        const getBookAjax = (page) => {
            return $.ajax({
                method: 'get',
                url: route('home.index', {
                    'page': page
                }),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const getBookGenreAjax = (id, page) => {
            return $.ajax({
                method: 'get',
                url: route('home.genre', {
                    'id': id,
                    'page': page
                }),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const searchAjax = (data, page) => {
            return $.ajax({
                method: 'post',
                url: route('home.search', {
                    'page' : page
                }),
                data: data,
                contentType: 'application/json'
            });
        };

        const getBookSearch = (page = 1) => {
            let keyword = {};
            keyword.value = $("#keyword").val();
            let data = JSON.stringify(keyword);
            searchAjax(data, page).done(result => {
                drawBook(result);
                drawPaginate(result, 'search');
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        $("#keyword").on('keyup', function(){
            let keyword = {};
            keyword.value = $('#keyword').val();
            let data = JSON.stringify(keyword);
            let page = 1;
            searchAjax(data, page).done(result => {
                drawBook(result);
                drawPaginate(result, 'search');
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        });

        const getBookGenre = (id = 1, page = 1) => {
            getBookGenreAjax(id, page).done(result => {
                drawBook(result);
                drawPaginate(result, 'genre', id);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const getBookAll = (page = 1) => {
            getBookAjax(page).done(result => {
                drawBook(result);
                drawPaginate(result, 'all');
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const drawBook = data => {
            $('#draw-book').text('');
            let isExistData = data.paginate.data.length !== 0;
            if (isExistData) {
                $.each(data.paginate.data, (index, value) => {
                    $('#draw-book').append(
                        `<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="javascript:;" style="width: 270px; height: 340px;">
                                    <img src="${value.image}" alt="product image">
                                </a>
                                <div class="${value.sale > 0 ? 'hot__box' : ''}">
                                    <span class="hot-label">${value.sale > 0 ? value.sale : ''}</span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="single-product.html">${value.title}</a></h4>
                                <ul class="prize d-flex">
                                    <li class="${value.sale > 0 ? '': 'text-center'}">${value.price - value.price * (value.sale / 100)}</li>
                                    <li class="old_prize" >${value.sale > 0 ? value.price : ''}</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links" id="addToLink-${value.id}">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> `
                    );
                    if (value.available_quantity > 0){
                        let link = route('home.show', value.id);
                        $(`#addToLink-${value.id}`).append(
                            `<li><a class="wishlist"><i class="bi bi-shopping-cart-full" onclick="addToCart(${value.id})"></i></a></li>
                            <li><a title="Chi tiết" class="quickview modal-view detail-link" href="${link}"> <i class="bi bi-search"></i></a>`
                        );
                    } else {
                        $(`#addToLink-${value.id}`).append(
                            '<li><a class="wishlist"><i class="fa fa-ban" title="Hết hàng"></i></a></li>'
                        );
                    }
                });
            } else {
                $('#draw-book').append(
                `<div class="col">
                    <p>Không có kết quả tìm kiếm phù hợp</p>
                 </div>`
                );
            }
        };

        const drawPaginate = (data , type = 'all', id) => {
            $('#paginate-book').text('');
            let isExistData = data.paginate.data.length !== 0;
            if (isExistData) {
                let page = data.paginate.current_page;
                let listPaginate = [];
                for (let i = 1; i <= data.paginate.last_page; i++) {
                    listPaginate.push((i - 1) * 7 + 1);
                }

                let beginPage = listPaginate.find(item => Math.abs(item - page) < 7);
                let text = '';
                $('#paginate-book').text('');
                if(type === 'genre') {
                    text += `<li><a onclick="getBookGenre(${id}, ${page - 1 > 0 ? page - 1 : 1})"><i class="zmdi zmdi-chevron-left"></i></a></li>`;
                    for (let i = 0; i < 7 && beginPage + i <= data.paginate.last_page; i++) {
                        text += `<li class="${page === beginPage + i ? 'active' : ''}"><a onclick="getBookGenre(${id}, ${beginPage + i})">${beginPage + i}</a></li> \n`;
                    }
                    text += `<li><a onclick="getBookGenre(${id}, ${page + 1 <= data.paginate.last_page ? page +1 : data.paginate.last_page})"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
                }

                if (type === 'all') {
                    text += `<li><a onclick="getBookAll(${page - 1 > 0 ? page - 1 : 1})"><i class="zmdi zmdi-chevron-left"></i></a></li>`;
                    for (let i = 0; i < 7 && beginPage + i <= data.paginate.last_page; i++) {
                        text += `<li class="${page === beginPage + i ? 'active' : ''}"><a onclick="getBookAll(${beginPage + i})">${beginPage + i}</a></li> \n`;
                    }
                    text += `<li><a onclick="getBookAll(${page + 1 <= data.paginate.last_page ? page +1 : data.paginate.last_page})"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
                }

                if (type === 'search') {
                    text += `<li><a onclick="getBookSearch(${page - 1 > 0 ? page - 1 : 1})"><i class="zmdi zmdi-chevron-left"></i></a></li>`;
                    for (let i = 0; i < 7 && beginPage + i <= data.paginate.last_page; i++) {
                        text += `<li class="${page === beginPage + i ? 'active' : ''}"><a onclick="getBookSearch(${beginPage + i})">${beginPage + i}</a></li> \n`;
                    }
                    text += `<li><a onclick="getBookSearch(${page + 1 <= data.paginate.last_page ? page +1 : data.paginate.last_page})"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
                }
                $('#paginate-book').append(text);
            }
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
                            <span class="prize">${v.price} vnd</span>
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            getBookAll();
            drawCart();
        });

    </script>
@endsection()
