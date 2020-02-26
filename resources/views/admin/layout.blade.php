<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    @yield('css')
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <!--  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="../assets/admin/img/logo-small.png">
                    </div>
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                     Book Store
                </a>
            </div>
            <div class="sidebar-wrapper">
                @include('admin.partials.sidebar')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                @include('admin.partials.navbar')
            </nav>
            <!-- End Navbar -->

            <!-- <div class="panel-header panel-header-sm"></div> -->
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer footer-black footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        @include('admin.partials.footer')
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @yield('js')
</body>

</html>

