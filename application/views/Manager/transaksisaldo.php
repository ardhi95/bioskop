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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/datatables/dataTables.bootstrap.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/D_Table/jquery.dataTables.min.css');?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('Manager/header') ?>
  <?php $this->load->view('Manager/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaction Management
        <small>CRUD</small>
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
      <div class="col-md-3">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-usd"></i></span>
            <div class="info-box-content">
              <small>Saldo anda :</small>
              <span class="info-box-number">Rp. <?php foreach ($sal->result() as $saldonya) {
                $uang = number_format($saldonya->saldo,2,',','.');
                echo $uang;
              } ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>

          <div class="col-md-3">
          <!-- /.box -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-chevron-down"></i></span>
            <div class="info-box-content">
              <center>
              <small>Withdrawal Saldo</small>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <a href="<?= base_url(); ?>Manager/withdraw" class="btn btn-default" role="button">Withdrawal</a>
              </center>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>


        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Keuangan Diterima</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Manager</th>
                  <th>Nama Manajer</th>
                  <th>Penyedia SI</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($list->result() as $field){ ?>
                <tr>
                  <td><?=$field->id_withdrawal;?></td>
                  <td><?=$field->tanggal?></td>
                  <td><?=$field->id?></td>
                  <td><?=$field->first_name?></td>
                  <td><?=$field->nama?></td>
                  <td><?=$field->jumlah?></td>
                  <td><?=$field->status?></td>
                </tr>
                <?php } ?>
                </tbody>

                <tfoot>
                <tr>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Manager</th>
                  <th>Nama Manager</th>
                  <th>Penyedia SI</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
