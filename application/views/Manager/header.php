<!--Iconnya-->
<link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
<header class="main-header">
    <!-- Logo -->
    <?php $this->M_other->jsonlist($this->M_TSaldo->transaksi_Pending(),'pending');?>
    <a href="<?=base_url('Manager/Welcome')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>SP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Movie </b>Station</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">
                <?php
                 $where = array('status' => 0,'id_manager' => $this->session->userdata('kd_Manager'));
                $jumlah = $this->M_other->count_return_row('transaksi_withdrawal',$where);

                echo (int)$jumlah;
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada<?=$jumlah?> transaksi untuk diselesaikan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php
                $json_data = json_decode(file_get_contents(base_url()."/Assets/Admin/json/pending.json"),true);
                  for($i=0; $i<count($json_data); $i++){?>

                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('Assets/Admin/dist/img/new.svg')?>" class="img-circle" alt="New Transaction">
                      </div>
                      <h4>
                        <?=$json_data[$i]['id_withdrawal']?>
                        <small><i class="fa fa-clock-o"></i><?=$json_data[$i]['tanggal']?></small>
                      </h4>
                      <p><?="Rp ".number_format($json_data[$i]['jumlah'],2,',','.')?></p>
                    </a>
                  </li>
                  <?php } ?>
                 
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('Assets/Admin/dist/img/avatar.png')?>" class="user-image" alt="Notif">
              <span class="hidden-xs"><?=$this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=$this->session->userdata('picture');?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('nama');?>
                  <small>Terdaftar sejak : <?=$this->M_movie->first_value_where('created','id',$this->session->userdata('kd_Manager'),'manager_register');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('Manager/profil'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('Manager/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>