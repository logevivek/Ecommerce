<!DOCTYPE html>

<html lang="en">
    @include('backend.common.head')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            
            @include('backend.common.header')
            @include('backend.common.sidebar')
            
            @yield('content')

        </div>

            @include('backend.common.footer')
        
    </body>


</html>