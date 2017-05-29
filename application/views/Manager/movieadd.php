<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Bioskop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/fa/css/font-awesome.css">
  <!--Jquery-Confirm-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/datatables/dataTables.bootstrap.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/D_Table/jquery.dataTables.min.css');?>" type="text/css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/datepicker/datepicker3.css">
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

  <?php
  $a['list'] = $this->M_TSaldo->transaksi_Pending();
  $this->load->view('Manager/header',$a);
  ?>
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
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
            <li class="active"><a href="<?=base_url('Manager/tambah_movie')?>"><i class="fa fa-circle-o"></i> Movie CRUD</a></li>
            <li><a href="<?=base_url('Movie/tayang')?>"><i class="fa fa-circle-o"></i> <span> Jam tayang</span></a></li>
            <li>
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
        Movie Management
        <small>CRUD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-5">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>
            <div class="box-body">
            <?=$this->session->flashdata('pemberitahuan')?>
            <?=form_open('Movie/tambahkan')?>

              <div class="form-group">
                <label>ID Jadwal</label>
                <input type="text" value="<?=$Kode?>" name="id_jadwal" readonly="true" class="form-control" required/>
              </div>

                <input type="hidden" value="<?=$id_bioskop?>" name="id_bioskop" class="form-control" required/>

               <div class="form-group">
                <label>Film</label>
                <select name='id_movie' id='' class='form-control select2' required>
                  <option value="" disabled selected></option>
                  <?php foreach ($film as $flm) { ?>
                  <option value="<?php echo $flm->id_movie;?>"><?php echo $flm->Title; ?></option>
                  <?php } ?>
                </select>
                
              </div>

              <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Tayang</label>

                  <div class="input-group">
                    <input type="text" name="jam" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                <!-- /.form group -->
              </div>

              <div class="form-group">
                  <label>Type Theater</label>
                  <select name="type_theater" class='form-control select2' required>
                    <option value="" disabled selected></option>
                    <option value="gold">Gold</option>
                    <option value="premier">Premier</option>
                    <option value="reguler">Reguler</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Kuota</label>
                  <select name="kuota" class='form-control select2' required>
                    <option value="" disabled selected></option>
                    <option value="depan">Depan</option>
                    <option value="tengah">Tengah</option>
                    <option value="belakang">Belakang</option>
                    <option value="full">Full</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <div class="input-group date">
                  <input type="text" class="form-control" name="tgl_mulai" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <div class="input-group date">
                  <input type="text" class="form-control" name="tgl_selesai" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
              <div class="form-group">
                <label>Harga Movie</label>
                <input type="text" placeholder="Masukkan Harga Movie" name="harga" id="harga" onkeyup="formatangka(this)" class="form-control" required/>
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
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-7">

          <!-- iCheck -->
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title"><b>List of movies</b> you've ever added</h3>
            </div>
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Film</th>
                  <th>Jam Tayang</th>
                  <th>Type Theater</th>
                  <th>Kuota Kursi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php foreach($movie_list->result() as $m){ ?>
                  <td><?=$m->id_jadwal?></td>
                  <td><?=$m->Title?></td>
                  <td><?=$m->jam?></td>
                  <td><?=$m->type_theater?></td>
                  <td><?=$m->kuota?></td>
                  <td>
                  <a class="twitter" data-title="Konfirmasi Hapus" href="<?= base_url() ?>inventaris/Hapus_ALat/<?= $m->id_jadwal ?>"><button type="button" class="btn btn-success btn-xs"><span class='glyphicon glyphicon-zoom-in'></span></button>
                  </a>
                  &nbsp;
                    <a href="<?= base_url() ?>Movie/edit/<?= $m->id_jadwal ?>"><button type="button" class="btn btn-info btn-xs"><span class='glyphicon glyphicon-pencil'></span></button></a> &nbsp;

                  <a class="twitter" data-title="Konfirmasi Hapus" href="<?= base_url() ?>Movie/delete/<?= $m->id_jadwal ?>"><button type="button" class="btn btn-danger btn-xs"><span class='glyphicon glyphicon-trash'></span></button>
                  </a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Jika terjadi kesalahan data konfirmasi ke admin pusat <a href="">Documentation</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
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

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>Assets/Admin/plugins/select2/select2.full.min.js"></script>
<!--Jquery-Confirm-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=base_url()?>Assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>Assets/Admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>Assets/Admin/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?=base_url()?>Assets/Admin/plugins/ckeditor/ckeditor.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
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
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

<script type="text/javascript">
      $('a.twitter').confirm({
        content: "Apakah anda yakin akan menghapus data ini ?",
    });
</script>

<script type="text/javascript">
  function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>

<script type="text/javascript">
  function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>

<script>
  $(document).ready(function() {
    $('#example2').DataTable({
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
        }
    });

    var table = $('#example2').DataTable();
    $('#example2 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } ); 

  });
</script>
<script type="text/javascript">
   $(function () {
    CKEDITOR.replace('sinopsis');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
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
</body>
</html>
