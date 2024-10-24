
{{-- <footer class="main-footer">
  <strong>Copyright © 2021 <a href="#">Logelite Pvt. Ltd.</a>.</strong>
      All rights reserved.
    </footer>
  </div> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{asset('backend/js/script.js')}}"></script>
  <!-- jQuery -->
  <script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('backend/assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  {{-- <script src="{{asset('backend/assets/plugins/sparklines/sparkline.js')}}"></script> --}}
  <!-- JQVMap -->
  <script src="{{asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('backend/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('backend/assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('backend/assets/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('backend/assets/dist/js/pages/dashboard.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('backend/assets/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
<script>
// datable
</script>
{{--  Ckeditor--}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor
  .create( document.querySelector('#description' ) )
  .catch( error => {

  });
</script>

{{-- Product --}}
<script>
  ClassicEditor
  .create( document.querySelector('#pro_desc' ) )
  .catch( error => {

  });
</script>

{{-- Page --}}
<script>
  ClassicEditor
  .create( document.querySelector('#desc' ) )
  .catch( error => {
  });
</script>

{{-- Blog --}}
<script>
  ClassicEditor
  .create( document.querySelector('#blog_desc' ) )
  .catch( error => {
  });
</script>



