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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$this->session->userdata('picture');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->session->userdata('level');?></a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-file-video-o" aria-hidden="true"></i> <span>Movie Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Manager/tambah_movie')?>"><i class="fa fa-circle-o"></i> Movie CRUD</a></li>
            <li><a href="<?=base_url('Movie/tayang')?>"><i class="fa fa-circle-o"></i> <span> Jam tayang</span></a></li>ayang</a></li>
            <li class="active">
              <a href="#"><i class="fa fa-circle-o"></i> laporan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('today')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Harian</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('weekly')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Mingguan</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('monthly')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Bulananan</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span>Transaksi Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Manager/Transaksi');?>"><i class="fa fa-circle-o"></i> All Transaction</a></li>
            <li><a href="<?=base_url('Manager/PTransaksi')?>"><i class="fa fa-circle-o"></i> Pending Transaction</a></li>
          </ul>
        </li>
        <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaction Report
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
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan berdasarkan transaksi sebelumnya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Customer</th>
                  <th>Bioskop</th>
                  <th>Judul Film</th>
                  <th>Tgl Beli</th>
                  <th>Tgl Putar</th>
                  <th>Jam</th>
                  <th>Jumlah Uang</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($list->result() as $field){ ?>
                <tr>
                  <td><?=$field->kode;?></td>
                  <td><?=$field->customer?></td>
                  <td><?=$field->bioskop?></td>
                  <td><?=$field->film?></td>
                  <td><?=$field->beli?></td>
                  <td><?=$field->tanggal_pemutaran?></td>
                  <td><?=$field->jam?></td>
                  <td><?="Rp ".number_format($field->jml_uang,2,',','.')?></td>
                </tr>
                <?php } ?>
                </tbody>

                <tfoot>
                 <tr>
                   <th><small>Kode</small></th>
                  <th><small>Customer</small></th>
                  <th><small>Bioskop</small></th>
                  <th><small>Judul Film</small></th>
                  <th><small>Tgl Beli</small></th>
                  <th><small>Tgl Putar</small></th>
                  <th><small>Jam</small></th>
                  <th><small>Jumlah Uang</small></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

          <div class="col-md-3">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-aqua">

            <div class="info-box-content">
              <small>Penghasilan Hari ini :</small>
              <span class="info-box-number">Rp. <?=$P_Hari?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
           <div class="col-md-3">
          <!-- /.box -->
          <div class="info-box bg-yellow">

            <div class="info-box-content">
              <small>Akumulasi Minggu ini</small>
              <span class="info-box-number">Rp. <?=$P_Minggu?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
           <div class="col-md-3">
          <!-- /.info-box -->
          <div class="info-box bg-green">

            <div class="info-box-content">
              <small>Akumulasi Bulan ini</small>
              <span class="info-box-number">Rp. <?=$P_Bulan?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
           <div class="col-md-3">
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <small>Akumulasi Tahun ini</small>
              <span class="info-box-number">Rp. <?=$P_Tahun?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('Manager/footer');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/dist/js/jqueryUI.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
>
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

</script>

<script>

  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#example").length) {
        $("#example").DataTable({
          "pageLength": 40,
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7]
              }
            },
            {
              extend: "csvHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0,1,2,3,4,5, 6, 7 ]
              }
            },
            {
              extend: "excelHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
              }
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
              }
            },
            {
              extend: "print",
              className: "btn-sm",
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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
