<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Bioskop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/fa/css/font-awesome.css">
  <!--Iconnya-->
  <link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/datatables/dataTables.bootstrap.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/D_Table/jquery.dataTables.min.css');?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- CK Editor -->
  <script src="<?=base_url()?>Assets/Admin/plugins/ckeditor/ckeditor.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('Admin/header') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Movie
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>
            <div class="box-body">
            <?=form_open('Movie/tambahFilm')?>

              <div class="form-group">
                <label>ID Movie</label>
                <input type="text" name="id_movie" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="Title" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Production</label>
                <input type="text" name="Production" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="Year" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Tanggal Released</label>
                <div class="input-group date">
                  <input type="text" class="form-control" name="Released" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
              <div class="form-group">
                <label>Genre</label>
                <input type="text" name="Genre" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Director</label>
                <input type="text" name="Director" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Writer</label>
                <input type="text" name="Writer" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Actors</label>
                <input type="text" name="Actors" class="form-control" required/>
              </div>
              <div class="form-group">
              <label>Plot</label>
               <div class="box-body pad">
                  <textarea id="sinopsis" name="Plot" rows="10" cols="80" required=>
                   This is my textarea to be replaced with CKEditor.
                  </textarea>
              </div>
              </div>
              <div class="form-group">
                <label>Language</label>
                <input type="text" name="Language" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Country</label>
                <input type="text" name="Country" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Poster Url</label>
                <input type="text" name="Poster" class="form-control" required/>
              </div>

              <!-- <div class="form-group">
              <label>Sinopsis Film</label>
               <div class="box-body pad">
                  <textarea id="sinopsis" name="sinopsis" rows="10" cols="80" required=>
                   This is my textarea to be replaced with CKEditor.
                  </textarea>
              </div>
              </div> -->

             <?=form_submit('Simpan','Simpan','class="btn btn-primary"')?>
              <!-- /.form group -->
              <?=form_close()?>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('Manager/footer');?>

</div>
<!-- ./wrapper -->

<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="<?=base_url()?>Assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>Assets/Admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>Assets/Admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>Assets/Admin/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
<script src="<?=base_url('/Assets/Admin/plugins/D_Table/datatables.net-scroller/js/dataTables.scroller.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/jszip/dist/jszip.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/pdfmake/build/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('/Assets/Admin/plugins/D_Table/pdfmake/build/vfs_fonts.js');?>"></script>
<!-- page script -->
<!-- bootstrap time picker -->
<script src="<?=base_url()?>Assets/Admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
  $(function () {

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script>
    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    CKEDITOR.replace('sinopsis');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#example").length) {
        $("#example").DataTable({
          "pageLength": 30,
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0,1,2,3,4,5,6]
              }
            },
            {
              extend: "csvHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0,1,2,3,4,5, 6 ]
              }
            },
            {
              extend: "excelHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5,6 ]
              }
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
              }
            },
            {
              extend: "print",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
              }
            },
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    TableManageButtons.init();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.navbar-nav [data-toggle="tooltip"]').tooltip();
    $('.navbar-twitch-toggle').on('click', function(event) {
        event.preventDefault();
        $('.navbar-twitch').toggleClass('open');
    });
    
    $('.nav-style-toggle').on('click', function(event) {
        event.preventDefault();
        var $current = $('.nav-style-toggle.disabled');
        $(this).addClass('disabled');
        $current.removeClass('disabled');
        $('.navbar-twitch').removeClass('navbar-'+$current.data('type'));
        $('.navbar-twitch').addClass('navbar-'+$(this).data('type'));
    });
});
</script>
</body>
</html>
