<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Bioskop</title></title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <style type="text/css">

  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h2><b>Movie</b> Station</h2>
  </div>
  <div class="login-box-body">
  <div align="center">
    <img align="center" src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" class="img-circle" alt="User Image">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in untuk Mengenali Akun Anda</p>

    <div class="social-auth-links text-center">
      <a href="<?=$authUrl?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->
    <?=$this->session->flashdata('gagal').'<br>';?>
    <p><center>Kami Sarankan untuk masuk dengan akun google bila anda adalah user baru.</center></p><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>