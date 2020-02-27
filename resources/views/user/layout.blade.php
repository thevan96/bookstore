<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    @yield('css')
</head>

<body>
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        @include('user.partials.header')
        @yield('content')
        @include('user.partials.footer')
    </div>
    <!-- //Main wrapper -->

    @yield('js')
</body>

</html>
