<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
