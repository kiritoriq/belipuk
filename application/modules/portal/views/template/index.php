<?php $this->load->view('portal/template/header'); ?>
<?php $this->load->view('portal/template/navbar'); ?>
<script>
  $(document).ready(function() {
    $('#loading-state').delay(100).fadeOut();
  })
</script>

<style>
  #loading-state {
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,.7);
      position: fixed;
      z-index: 2000;
      display: nones;
  }

  .loadings {
      position: relative;
      /*left:46%; */
      top:45%;
      color: white;
  }
</style>


    <div id="loading-state" class="text-center">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
<div class="container-fluid" style="margin-top: 30px">
    <div id="utama">
        <?php $this->load->view($main_view) ?>
    </div>
</div>
<?php $this->load->view('portal/template/footer') ?>