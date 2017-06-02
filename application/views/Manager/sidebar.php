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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <a href="<?=base_url('Manager/Welcome')?>">
            <i class="fa fa-home" aria-hidden="true"></i> <span>Home</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-file-video-o" aria-hidden="true"></i> <span>Movie Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Manager/tambah_movie')?>"><i class="fa fa-circle-o"></i> Movie CRUD</a></li>
            <li><a href="<?=base_url('Movie/tayang')?>"><i class="fa fa-circle-o"></i> <span> Jam tayang</span></a></li>
          </ul>
        </li>

        <li class="treeview active">
            <a href="#">
            <i class="fa fa-file" aria-hidden="true"></i> <span>Laporan Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('today')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Harian</a></li>
            <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('monthly')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Bulananan</a></li>
            <li><a href="<?=base_url().'Manager/Laporan?id='.$this->M_other->encrypt('alltransaction')?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Tahunan</a></li>
          </ul>

        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span>Transaksi Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Manager/Transaksi');?>"><i class="fa fa-circle-o"></i> All Transaction</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>