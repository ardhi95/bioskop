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
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/sweet/sweetalert2.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/datatables/dataTables.bootstrap.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/D_Table/jquery.dataTables.min.css');?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">
  <!--Jquery-Confirm-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">

  <style type="text/css">
    td.highlight {
      background-color: whitesmoke !important;
    }
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('Admin/header') ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manager
        <small>list</small>
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
              <h3 class="box-title">data manajer yang bergabung</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Provider</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Tgl Daftar</th>
                  <th>Terakir Masuk</th>
                  <th>Rekening</th>
                  <th>Saldo</th>
                  <!-- <th>Aksi</th> -->
                </tr>
                </thead>

                <tbody>
                <?php foreach($data->result() as $field){ ?>
                <tr>
                  <td><?=$field->id;?></td>
                  <td><img src="<?=base_url('Assets/Admin/dist/img/admin/').$field->oauth_provider.'.png'?>"> <?=$field->oauth_provider?></td>
                  <td><?=$field->first_name." ".$field->last_name?></td>
                  <td><?=$field->email?></td>
                  <td><?=$field->created?></td>
                  <td><?=$field->modified?></td>
                  <td><?=$field->no_rekening;?></td>
                  <td><?="Rp ".number_format($field->saldo,2,',','.')?></td>
                  <!-- <td align="center">
                  <a class="twitter" data-title="ACC Transaksi" href="<?= base_url()."Saldo/del?kode=".$this->M_other->encrypt($field->id)?>"><button type="button" class="btn btn-danger btn-xs"><span class='glyphicon glyphicon-trash'></span></button>
                  </td> -->
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

  
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
<!-- SweetAlert -->
<script src="<?=base_url()?>Assets/Admin/plugins/sweet/sweetalert2.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!--Jquery-Confirm-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>

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
<script type="text/javascript">
      $('a.twitter').confirm({
        content: "Setelah anda klik tombol ini, maka saldo Akan ditransfer ke user",
    });

</script>

<script>

  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#example").length) {
        $("#example").DataTable({
          "paging": true,
      "stateSave": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "pagingType": "full_numbers",
      "language": {
            "lengthMenu": "Tampil _MENU_ Data",
            "zeroRecords": "Maaf tidak ada data",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
          "pageLength": 40,
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

      var table = $('#example2').DataTable();
    $('#example2 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } ); 
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

<script type="text/javascript">
  $(document).ready(function(){
    <?php if ( $this->session->flashdata('status1')){ ?>
      swal("Gagal", "Update Failded", "error");
      <?php }
      else if ($this->session->flashdata('status2')) { ?>
      swal("Berhasil", "Saldo Telah Dikirim", "success");
      <?php } ?>
      
  })
  </script>
</body>
</html>
