<!DOCTYPE html>

<html lang="en">
    @include('front.common.head')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            @include('front.common.header_other')

            @yield('content')

        </div>

            @include('front.common.footer')

    </body>

</html>