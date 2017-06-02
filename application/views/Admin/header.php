<!--Iconnya-->
<link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('Manager/Welcome')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>SP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Movie</b>Station</span>
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
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('Assets/Admin/dist/img/avatar.png')?>" class="user-image" alt="Notif">
              <span class="hidden-xs"><?=$this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('nama');?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('Admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
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

    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->session->userdata('level');?></a>
        </div>
      </div>

      <!-- /.search form -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-usd" aria-hidden="true"></i> <span>Data Saldo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'Saldo') { echo 'active'; } ?>"><a href="<?=base_url('Saldo')?>"><i class="fa fa-circle-o"></i> Saldo New</a></li>
            <li class="<?php if($this->uri->uri_string() == 'Saldo/verified') { echo 'active'; } ?>"><a href="<?=base_url('Saldo/verified')?>"><i class="fa fa-circle-o"></i> <span> Saldo terkirim</span></a></li>ayang</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span>CRUD Manajemen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'Admin/get_manager') { echo 'active'; } ?>"><a href="<?=base_url('Admin/get_manager')?>"><i class="fa fa-circle-o"></i> Manajer</a></li>
            <li class="<?php if($this->uri->uri_string() == 'Admin/get_bioskop') { echo 'active'; } ?>"><a href="<?=base_url('Admin/get_bioskop')?>"><i class="fa fa-circle-o"></i> Bioskop</a></li>
            <li class="<?php if($this->uri->uri_string() == 'Admin/get_customer') { echo 'active'; } ?>"><a href="<?=base_url('Admin/get_customer')?>"><i class="fa fa-circle-o"></i> Customer</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Movie</a></li>
          </ul>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
            <span>Withdrawal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Admin/PTransaksi')?>"><i class="fa fa-circle-o"></i> Transaksi Pending</a></li>
            <li><a href="<?=base_url('Admin/HTransaksi')?>"><i class="fa fa-circle-o"></i> History</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>