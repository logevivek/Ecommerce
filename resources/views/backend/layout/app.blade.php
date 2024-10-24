<!DOCTYPE html>

<html lang="en">
    @include('backend.common.head')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('backend.common.header')
            @include('backend.common.sidebar')
            @yield('content')

            <footer class="main-footer">
                <strong>Copyright © 2021 <a href="#">Logelite Pvt. Ltd.</a>.</strong>
                    All rights reserved.
             </footer>
            
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>

        </div>

            @include('backend.common.footer')
        
    </body>


</html>