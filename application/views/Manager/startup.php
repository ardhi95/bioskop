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
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css"
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini" oncontextmenu="return false;">
<div class="wrapper">

  <?php
  $a['list'] = $this->M_TSaldo->transaksi_Pending();
  $this->load->view('Manager/header',$a);  ?>
  <?php $this->load->view('Manager/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
         <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?=$this->session->userdata('picture');?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?=$this->session->userdata('nama');?></h3>
              <h5 class="widget-user-desc"><?=$this->session->userdata('level');?> Bioskop</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>
                  <a>ID <span class="pull-right badge">
                    <?=$this->M_movie->first_value_where('oauth_uid','id',$this->session->userdata('kd_Manager'),'manager_register');
?></span></a></li>
                <li><a>Email <span class="pull-right badge"><?=$this->M_movie->first_value_where('email','id',$this->session->userdata('kd_Manager'),'manager_register');
?></span></a></li>
                <li><a>Rekening <span class="pull-right badge"><?=$this->M_movie->first_value_where('no_rekening','id',$this->session->userdata('kd_Manager'),'manager_register');
?></span></a></li>
                <li><a>Saldo <span class="pull-right badge"><?=$this->M_movie->first_value_where('saldo','id',$this->session->userdata('kd_Manager'),'manager_register');
?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$HStep?> Step Lagi untuk menyelesaikan start-up</h3>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$PgB?>%">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
            </div>
        </div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">Alur Kerja</a></li>
              <li><a href="#akunmu" data-toggle="tab">Profile</a></li>
              <li><a href="#settings" data-toggle="tab">Bioskop</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div  class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          Start Program
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-check-square bg-red"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a>Admin</a>, Selamat Bergabung</h3>

                      <div class="timeline-body">
                        Selamat, akun anda berhasil dibuat. Terimakasih telah bergbung bersama kami, kami adalah layanan <b>e-commers</b> untuk penjualan tiket bioskop yang berbasis di kota Malang. Semoga kami bisa membantu kesuksesan anda.
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-danger btn-xs">1</a>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-hourglass-start bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a>Admin</a>, Informasi Penting</h3>

                      <div class="timeline-body">
                        Anda harus melengkapi data anda seperti info akun dan menambah informasi bioskop anda. Sebelum anda mengatur <i>requrement</i> ini maka fitur yang ada dalam Sistem Informasi Bioskop ini tidak akan berjalan. Terimakasih.
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">2</a>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-money bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a>Admin</a> Pantau transaksi tiket</h3>

                      <div class="timeline-body">
                        Transaksi akan dilakukan oleh administrasi perhari sesuai penjualan tiket di bioskop anda, waktu pengiriman akan dilakukan pada pukul <span class="time"><i class="fa fa-clock-o"></i> 10:00 PM,</span>
                        anda diwajibkan untuk menekan tombol ACC untuk menerima saldo ke rekening anda.
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">3</a>
                      </div>
                    </div>
                  </li>

                  <li class="time-label">
                        <span class="bg-green">
                          Dukungan Sistem
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-laptop bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a>Admin</a>, Kami Terintegrasi</h3>

                      <div class="timeline-body">
                        <img src="<?=base_url('Assets/Admin/dist/img/google.png')?>" alt="Google+" class="margin">
                        <img src="<?=base_url('Assets/Admin/dist/img/twitter.png')?>" alt="Twitter" class="margin">
                        <img src="<?=base_url('Assets/Admin/dist/img/droid.png')?>" alt="Android" class="margin">
                        <img src="<?=base_url('Assets/Admin/dist/img/html5.png')?>" alt="HTML5" class="margin">
                        <img src="<?=base_url('Assets/Admin/dist/img/js.png')?>" alt="Java Script" class="margin">
                         <img src="<?=base_url('Assets/Admin/dist/img/CI.png')?>" alt="Codeigniter" class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-heart-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="akunmu">
                          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tingkatkan Akurasi Profile Anda</h3>
            </div>
            <div class="box-body">
            <?=form_open('StartUp/UpdateAkun')?>
            <?php foreach ($Man as $datasaya) {?>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" id="email" value="<?=$datasaya->email;?>" class="form-control" readonly placeholder="Email">
              </div>
              <br>
              <h4>Masukkan Nomer Rekening Anda</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" name="no_rekening" id="no_rekening" placeholder="Masukkan No.Rekening" value="<?=$datasaya->no_rekening;?>" class="form-control">
                <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
              </div>
              <!-- /input-group -->
               <?php } ?>
               <br>
             <?=form_submit('Update','Update','class="btn btn-success btn-sm"')?>
              <!-- /.form group -->
              <?=form_close()?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>

              <div class="tab-pane" id="settings">
                <?=form_open('StartUp/insbioskop','class="form-horizontal"');?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Bioskop</label>

                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id_bioskop" id="id_bioskop" placeholder="Name" value="<?=$code;?>" >
                     <label for="inputEmail" class="control-label">Kode Bioskop <?=$code;?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Manajer</label>

                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id_manager" id="id_manager" value="<?=$this->session->userdata('kd_Manager');?>">
                       <label for="inputEmail" class="control-label">Kode Manager untuk anda adalah <?=$this->session->userdata('kd_Manager');?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Bioskop</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_bioskop" id="nama_bioskop" placeholder="Silahkan Masukkan Nama Bioskop Anda" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea class="form-control"  name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap Bioskop Anda" required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="setuju" /> Saya Telah <a >Mengisi data dengan sebenar-benarnya</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" disabled='disabled' id="simpan" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                <?=form_close();?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view('Manager/footer');?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>Assets/Admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>Assets/Admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>Assets/Admin/dist/js/demo.js"></script>

<script type="text/javascript">
  var checker = document.getElementById('setuju');
var sendbtn = document.getElementById('simpan');
checker.onchange = function() {
  document.getElementById("simpan").disabled= false;
};
</script>
</body>
</html>
