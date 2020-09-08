  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar elevation-4">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $this->session->userdata('image'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="<?php echo (isset($current['dashboard']))?$current['dashboard']:'' ?>">
            <a href="<?php echo base_url() ?>admin/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li class="treeview <?php echo (isset($current['masterproduk']))?$current['masterproduk']:'' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (isset($subcurrent['masterproduk']))?$subcurrent['masterproduk']:'' ?>">
                <a href="<?php echo base_url() ?>admin/masterproduk"><i class="fa  fa-chevron-circle-right"></i> Master Produk</a>
              </li>
            </ul>
          </li>

          <li class="treeview <?php echo (isset($current['transaksi']))?$current['transaksi']:'' ?>">
            <a href="#">
              <i class="fa fa-dollar"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (isset($subcurrent['daftarpesan']))?$subcurrent['daftarpesan']:'' ?>">
                <a href="<?php echo base_url() ?>admin/daftarpesan"><i class="fa  fa-chevron-circle-right"></i> Daftar Pemesanan</a>
              </li>
              <li class="<?php echo (isset($subcurrent['jadwalkirim']))?$subcurrent['jadwalkirim']:'' ?>">
                <a href="<?php echo base_url() ?>admin/jadwalkirim"><i class="fa  fa-chevron-circle-right"></i> Jadwal Pengiriman</a>
              </li>
            </ul>
          </li>

          <?php if($this->session->userdata('role_id') > 4 OR $this->session->userdata('role_id') == 1){ ?>
            <li class="treeview <?php echo (isset($current['laporan']))?$current['laporan']:'' ?>">
              <a href="#">
                <i class="fa fa-paste"></i> <span>Laporan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo (isset($subcurrent['laporanpenjualan']))?$subcurrent['laporanpenjualan']:'' ?>">
                  <a href="<?php echo base_url() ?>admin/laporanpenjualan"><i class="fa  fa-chevron-circle-right"></i> Laporan Penjualan</a>
                </li>
                <li class="<?php echo (isset($subcurrent['laporanpengadaan']))?$subcurrent['laporanpengadaan']:'' ?>">
                  <a href="<?php echo base_url() ?>admin/laporanpengadaan"><i class="fa  fa-chevron-circle-right"></i> Laporan Pengadaan</a>
                </li>
                <li class="<?php echo (isset($subcurrent['laporandistribusi']))?$subcurrent['laporandistribusi']:'' ?>">
                  <a href="<?php echo base_url() ?>admin/laporandistribusi"><i class="fa  fa-chevron-circle-right"></i> Laporan Distribusi</a>
                </li>
              </ul>
            </li>
        <?php } ?>
          <!-- <li class="treeview <?php //if($page == 'prosesrekomendasi' || $page == 'analisadata') echo 'active'; else echo ''; ?>">
            <a href="#">
              <i class="fa fa-forward"></i> <span>Proses</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php //if($page == 'prosesrekomendasi') echo 'active'; else echo ''; ?>">
                <!-- <a href="index.php?page=inputsimpan"><i class="fa fa-chevron-circle-right"></i> Entry Simpan</a> -->
                <!-- <a href="index.php?page=prosesrekomendasi"><i class="fa fa-chevron-circle-right"></i> Proses Rekomendasi</a>
              </li>
              <li class="<?php //if($page == 'analisadata') echo 'active'; else echo ''; ?>">
                <a href="index.php?page=analisadata"><i class="fa fa-chevron-circle-right"></i> Analisa Data Rekomendasi</a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="treeview <?php //if($page == 'statistikrekomendasi' || $page == 'datarekomendasi' || $page == 'datapeminatan') echo 'active'; else echo ''; ?>">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php //if($page == 'datarekomendasi') echo 'active'; else echo ''; ?>">
                <a href="index.php?page=datarekomendasi"><i class="fa  fa-chevron-circle-right"></i> Data Rekomendasi Mahasiswa</a>
              </li>
              <!-- <li class="<?php //if($page == 'datapeminatan') echo 'active'; else echo ''; ?>">
                <a href="index.php?page=datapeminatan"><i class="fa  fa-chevron-circle-right"></i> Data Peminatan Mahasiswa</a>
              </li> -->
              <!-- <li class="<?php //if($page == 'statistikrekomendasi') echo 'active'; else echo ''; ?>">
                <a href="index.php?page=statistikrekomendasi"><i class="fa  fa-chevron-circle-right"></i> Statistik Rekomendasi</a>
              </li> -->
              
            <!-- </ul> -->
          <!-- </li> -->

          <?php if($this->session->userdata('role_id') == 1) { ?>
            <li class="treeview <?php echo (isset($current['setting']))?$current['setting']:"" ?>">
                  <a href="#">
                    <i class="fa fa-gear"></i> <span>Setting</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo (isset($subcurrent['users']))?$subcurrent['users']:"" ?>">
                      <a href="<?php echo base_url() ?>admin/users"><i class="fa  fa-chevron-circle-right"></i> Users</a>
                    </li>
                  </ul>
                </li>
                    <!-- <li class="submenu">
                      <a href=""><i class="fa  fa-chevron-circle-right"></i> Laporan Kegiatan</a>
                    </li>
                    <li class="submenu">
                      <a href=""><i class="fa  fa-chevron-circle-right"></i> Laporan Simpan Potong Gaji</a>
                    </li> -->
        <?php  } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>