<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Bioskop</title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/bootstrap/css/bootstrap.min.css">
 <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/fa/css/font-awesome.css">
  <!--Iconnya-->
  <link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?=base_url()?>Assets/Admin/index2.html"><b>SI.</b>Bioskop</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Sesi Administrasi</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <?php
      echo form_open('Admin/firstcek', array(
      'class' => 'lockscreen-credentials'
    ));
    ?>
      <div class="input-group">
        <input type="password" name="email" class="form-control" placeholder="Masukkan Email">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>

    <?=form_close()?>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <?=$this->session->flashdata('status')?>
    kami akan mengecek email untuk alasan keamanan
  </div>
  <div class="text-center">
    <a href="<?=base_url()?>">atau masuk sebagai manajer</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?=date('Y')?> <b>D3 - Management Informatika</b>.</strong><br> All rights
    reserved.
  </div>
</div>
<!-- /.center -->

<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
