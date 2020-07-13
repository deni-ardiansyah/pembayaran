</div>
<!-- <body class="hold-transition login-page"> -->
  <div class="hold-transition control-sidebar-dark ">
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 Deni Ardiansyah</strong> All rights
    reserved.
  </footer>
</div>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
<!-- </body> -->




<!-- jQuery 3 -->
<script src="<?=base_url()?>/_assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>/_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<!-- <script src="<?=base_url()?>/_assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

 -->
    <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/_assets/bower_components/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="<?=base_url()?>/_assets/bower_components/DataTables/datatables.min.js"></script>
<!-- DataTabel Checkbox -->
    <link type="text/css" href="<?=base_url()?>/_assets/bower_components/datatables-checkbox/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="<?=base_url()?>/_assets/bower_components/datatables-checkbox/js/dataTables.checkboxes.min.js"></script>



<!-- SlimScroll -->
<script src="<?=base_url()?>/_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>/_assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/_assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    // $('#example1').DataTable()
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false


        $("#example1").DataTable();
        $('#example2').DataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false

    })
  })
</script>


<script >
  var table = $('#example').DataTable({
   'columnDefs': [
      {
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         }
      }
   ],
   'select': {
      'style': 'multi'
   },
   'order': [[1, 'asc']]
});
</script>

</body>
</html>
