<?php
    echo $this->load->view('header');
    echo $this->load->view('sidebar');
?>

<script>
  $(document).ready(function() {
    $('#loading-state').delay(850).fadeOut();
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

  <div id="loading-state">
      <p class='loadings' align='center'>
          <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>            
      </p>
  </div>
  <!-- Content Wrapper. Contains page content -->
    <div id="utama" class="content-wrapper">
      <?php
        // echo "<pre>";
        // print_r($this->session->all_userdata());
        // echo "</pre>";
        $this->load->view($main_view);
      ?>
        <!-- Main content -->
    </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('footer'); ?>