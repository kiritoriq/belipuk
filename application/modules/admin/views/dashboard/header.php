<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. Pusri Palembang | Dashboard</title>
  <!-- Icon Image -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/Images/logo_pusri_fix_2.jpg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Datetimepicker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Fileinput JS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fileinput.min.css">
  <!-- JQuery Validation Engine CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/validationengine/css/validationEngine.jquery.css">


  <!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Plugins Fileinput -->
<script src="<?php echo base_url() ?>assets/js/plugins/piexif.min.js"></script>
<!-- Plugins Fileinput -->
<script src="<?php echo base_url() ?>assets/js/plugins/sortable.min.js"></script>
<!-- Plugins Fileinput -->
<script src="<?php echo base_url() ?>assets/js/plugins/purify.min.js"></script>
<!-- Fileinput JS -->
<script src="<?php echo base_url() ?>assets/js/fileinput.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Bootbox -->
<script src="<?php echo base_url() ?>assets/plugins/bootbox/bootbox.all.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Datetimepicker -->
  <script src="<?php echo base_url() ?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- JQuery Validation -->
<script src="<?php echo base_url() ?>assets/plugins/validation/jquery.validate.min.js"></script>
<!-- JQuery Validation Engine -->
<script src="<?php echo base_url() ?>assets/plugins/validationengine/js/languages/jquery.validationEngine-id.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/validationengine/js/jquery.validationEngine.min.js"></script>
<!-- JQuery Number -->
<script src="<?php echo base_url() ?>assets/plugins/Number/jquery.number.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Chartjs -->
<script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  .skin-blue .main-header .navbar {
    background-color: #005ba2;
  }

  .skin-blue .main-header .logo {
    background-color: #035fa6; 
  }

  .skin-blue .main-header .logo:hover {
    background-color: #024275;
  }

  .skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #024275;
  }

  .skin-blue .main-header li.user-header {
    background-color: #005ba2;
  }

  .elevation-4 {
    box-shadow: 0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22) !important;
  }

  /* .skin-blue .sidebar-menu > li.active > a {
    border-left-color: #007bff;
  } */

  /*.skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
    color: #fff;
    background: #007bff;
  }

  .skin-blue .sidebar-menu .treeview-menu > li.active > a, .skin-blue .sidebar-menu .treeview-menu > li > a:hover {
    color: #000;
    background-color: #eff1f5;
  }*/

  .bg-danger {
    background-color: #dd4b39;
    color: #fff;
  }

  .bg-kuning {
    color: #fff;
    background-color: #f39c12;
  }

  .bg-primary {
    color: #fff;
    background-color: #005ba2;
  }

  .bg-belum {
    background-color: #ecbbbb; 
  }

  .btn-kuning {
    background-color: #f3e512;
    color: #373737;
  }

  .btn-kuning:hover {
    background-color: #dfd209;
    /* color: #fff; */
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIP</b> Pupuk Pusri</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $this->session->userdata('image') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $this->session->userdata('image') ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama')." - ".$this->session->userdata('role') ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>admin/logout" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>