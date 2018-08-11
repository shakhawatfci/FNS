@include('admin.include.header')
@include('admin.include.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
     
     @yield('content')

    </section>
    <!-- /.content -->
  </div>
 

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('admin_asset/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_asset/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('admin_asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin_asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_asset/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_asset/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin_asset/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin_asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_asset/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_asset/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
<script src="{{ asset('admin_asset/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script src="{{ asset('admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_asset/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $(function () {
    $('.bs-datatable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
   
   // select2

     $('.select2').select2()
</script>

 <script type="text/javascript">
  var startDate = new Date();
var fechaFin = new Date();
var FromEndDate = new Date();
var ToEndDate = new Date();




$('.month').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'yyyy-mm'
}).on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to').datepicker('setStartDate', startDate);
    }); 






 </script>

<script>


  @if(Session::has('success'))

  toastr.success("{{ Session::get('success') }}");

  @endif


  @if(Session::has('info'))

  toastr.info("{{ Session::get('info') }}");

  @endif


  @if(Session::has('warning'))

  toastr.warning("{{ Session::get('warning') }}");

  @endif


  @if(Session::has('error'))

  toastr.error("{{ Session::get('error') }}");

  @endif


</script>

<script>

  $(document).ready(function(){

   $('#menu').change(function(){

    var id = $(this).val();

    var data_url = "{{ url('admin/get-category') }}"+'/'+id;

    $.ajax({

     url :  data_url,
     datatype : "html"
   }).done(function(data){

    $('#category').html(data);
   });

 });

 });

</script>

<script>

  $(document).ready(function(){

   $('#category').change(function(){

    var id = $(this).val();

    var data_url = "{{ url('admin/get-subcategory') }}"+'/'+id;

    $.ajax({

     url :  data_url,
     datatype : "html"
   }).done(function(data){

    $('#subcategory').html(data);
   });

 });

 });  



</script>

 @stack('script')
</body>
</html>
