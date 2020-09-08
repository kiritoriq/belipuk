<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon Image -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/Images/logo_pusri_fix_2.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
    <!-- JQuery Validation Engine CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/validationengine/css/validationEngine.jquery.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/piexif.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/sortable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/purify.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootbox/bootbox.all.min.js"></script>
    <!-- JQuery Number -->
    <script src="<?php echo base_url() ?>assets/plugins/Number/jquery.number.min.js"></script>
    <!-- JQuery Validation Engine -->
    <script src="<?php echo base_url() ?>assets/plugins/validationengine/js/languages/jquery.validationEngine-id.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/validationengine/js/jquery.validationEngine.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fileinput.min.js"></script>

    <title>Beli Pupuk Pusri Online</title>
  </head>
    <style>
      header {
        background: #ebede0;
        color: #000;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
      }

      .logo {
        padding: 10px 10px 5px;
        flex-shrink: 0;
        width: 160px;
      }

      .header-search {
        padding: 5px 0px 25px 120px;
      }

      .header-search form .input-select {
        margin-right: -4px;
        border-radius: 40px 0 0 40px;
      }

      .input-select {
        padding: 0 15px;
        background: #fff;
        border: 1px solid #e4e7ed;
        height: 40px; 
      }

      .header-search form .search-btn {
        height: 40px;
        width: 100px;
        background: #d10024;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 0 40px 40px 0;
      }

      .input-search {
        height: 40px;
        padding: 0 15px;
        border: 1px solid #e4e7ed;
        background-color: #fff;
        width: 100%
      }

      .header-search form .input-search {
        width: calc(100% - 260px);
        margin-right: -4px;
      }

      .header-right {
        padding: 15px 30px;
      }

      footer {
        /*background: #222;*/
        color: #fff;
        padding-top: 10px;
      }

      footer .copyright {
        padding: 15px 0;
        background: #005ba2;
        margin-top: 20px;
        font-size: 15px;
      }

      footer .copyright span {
        /* color: #0894d1; */
        color: #fde81d;
      }

      body {
        background-image: linear-gradient(#d9faff, white);
        /*padding-top: 60px;*/
      }

      .bg-yellow {
        background-color: #dbd46e !important;
      }

      .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 0, 0, 0.5);
      }

      .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .show > .nav-link {
        /*background-color: rgba(255, 0, 0, 0.5);*/
        padding-top: none;
        color: #4073ec;
      }

      .navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
        color: #4073ec;
      }

      .section {
          margin-top: 100px
      }

      * {
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          margin: 0;
          padding: 0;
          -webkit-tap-highlight-color: transparent;
          zoom: 1
      }

      html {
          font-size: 16px;
          min-height: 100%
      }

      body {
          font: 75%/150% "Lato", Arial, Helvetica, sans-serif;
          background-color: #fff;
          color: #838383;
          overflow-x: hidden;
          -webkit-font-smoothing: antialiased;
          -ms-overflow-style: scrollbar;
          oveflow-y: scroll
      }

      iframe,
      img {
          border: 0
      }

      a {
          text-decoration: none;
          color: inherit
      }

      a:hover,
      a:focus {
          color: #01b7f2;
          text-decoration: none
      }

      a:focus {
          outline: none
      }

      p {
          font-size: 1.0833em;
          line-height: 1.6666;
          margin-bottom: 15px
      }

      dt {
          font-weight: normal
      }

      span.active,
      a.active,
      h2.active,
      h3.active,
      h4.active,
      h5.active,
      h6.active {
          color: #01b7f2
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
          margin: 0 0 15px;
          font-weight: normal;
          color: #2d3e52
      }

      h1 {
          font-size: 2em;
          line-height: 1.25em
      }

      h2 {
          font-size: 1.6667em;
          line-height: 1.25em
      }

      h3 {
          font-size: 1.5em;
          line-height: 1.2222em
      }

      h4 {
          font-size: 1.3333em;
          line-height: 1.25em
      }

      h5 {
          font-size: 1.1666em;
          line-height: 1.1428em
      }

      h6 {
          font-size: 1em
      }

      h1.fourty-space {
          font-size: 1.3333em;
          line-height: 1.25em;
          letter-spacing: .04em
      }

      h2.fourty-space {
          font-size: 1.1666em;
          line-height: 1.1428em;
          letter-spacing: .04em
      }

      h3.fourty-space {
          font-size: 1.0833em;
          line-height: 1.1428em;
          letter-spacing: .04em
      }

      h4.fourty-space {
          font-size: 1em;
          line-height: 1.1em;
          letter-spacing: .04em
      }

      h5.fourty-space {
          font-size: 0.9166;
          line-height: 1.1em;
          letter-spacing: .04em
      }

      h6.fourty-space {
          font-size: 0.8333em;
          line-height: 1.1em;
          letter-spacing: .04em
      }

      ol,
      ul {
          list-style: none;
          margin: 0
      }

      .banner .med-caption {
          font-size: 2.5em
      }

      .box-title {
          margin-bottom: 0;
          line-height: 1em
      }

      .box-title small {
          font-size: 10px;
          color: #838383;
          text-transform: uppercase;
          display: block;
          margin-top: 4px
      }

      button,
      input[type="button"].button,
      a.button {
          border: none;
          color: #fff;
          cursor: pointer;
          padding: 0 15px;
          white-space: nowrap
      }

      button.btn-small,
      input[type="button"].button.btn-small,
      a.button.btn-small {
          height: 28px;
          padding: 0 24px;
          line-height: 28px;
          font-size: 0.9167em
      }

      a.button {
          display: inline-block;
          background: #d9d9d9;
          font-size: 0.8333em;
          line-height: 1.8333em;
          white-space: nowrap;
          text-align: center
      }

      a.button:hover {
          background: #98ce44
      }

      button.yellow,
      a.button.yellow,
      input[type="button"].button.yellow {
          background: #f0715f
      }

      button.yellow:hover,
      a.button.yellow:hover,
      input[type="button"].button.yellow:hover {
          background: #f0715f
      }

      .five-stars-container {
          display: inline-block;
          position: relative;
          font-family: 'Glyphicons Halflings';
          font-size: 14px;
          text-align: left;
          cursor: default;
          white-space: nowrap;
          line-height: 1.2em;
          color: #dbdbdb
      }

      .five-stars-container .five-stars,
      .five-stars-container.editable-rating .ui-slider-range {
          display: block;
          overflow: hidden;
          position: relative;
          background: #fff;
          padding-left: 1px
      }

      .five-stars-container .five-stars:before,
      .five-stars-container.editable-rating .ui-slider-range:before {
          content: "\e006\e006\e006\e006\e006";
          color: #ef715f
      }

      .five-stars-container:before {
          display: block;
          position: absolute;
          top: 0;
          left: 1px;
          content: "\e006\e006\e006\e006\e006";
          z-index: 0
      }

      .price {
          color: #7db921;
          font-size: 1.6667em;
          text-transform: uppercase;
          float: right;
          text-align: right;
          line-height: 1;
          display: block
      }

      .price small {
          display: block;
          color: #838383;
          font-size: 0.5em
      }

      .price-wrapper {
          font-weight: normal;
          text-transform: uppercase;
          font-size: 0.8333em;
          color: inherit;
          line-height: 1.3333em;
          margin: 0
      }

      .price-wrapper .price-per-unit {
          color: #7db921;
          font-size: 1.4em;
          padding-right: 5px
      }

      .image-carousel.style2 .slides>li {
          margin-right: 30px
      }

      .image-box .box>.details,
      .image-box.box>.details {
          padding: 12px 15px
      }

      .listing-style1.hotel .feedback {
          margin: 5px 0;
          border-top: 1px solid #f5f5f5;
          padding-top: 5px;
          border-bottom: 1px solid #f5f5f5
      }

      .listing-style1.hotel .feedback .review {
          display: block;
          float: right;
          text-transform: uppercase;
          font-size: 0.8333em;
          color: #9e9e9e
      }

      .listing-style1.hotel .action .button:last-child {
          /* float: right */
      }

      .box {
          border: 1px solid #cccccc
      }

      .fa {
          color: #fde81d;
      }

      .bg-biru {
        background-color: #005ba2 !important;
        color: #fff;
      }
    </style>
  <body>
  <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="logo">
              <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/Images/logo_pusri_pjg.jpg" alt="logo" style="width: 170%"></a>
            </div>
          </div>
          <div class="col-sm-6">
            &nbsp;
          </div>
          <div class="col-sm-3">
            <!-- <div class="header-right">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Cart</span>
              </a> &nbsp;&nbsp;
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Login</span>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </header>