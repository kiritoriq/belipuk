<br>
<br>
<div class="container" style="min-height: 700px;">
  
  <?php
    foreach($item as $pesanan){
  ?>
    <h2 align="center">Pesanan Tiket</h2>
          <form id="bayarpesan" class="form-horizontal" method="post" action="<?php echo base_url().'home/pesan/bayar/'.$pesanan['no_pesan'] ?>">
            <input type="hidden" id="idpesan" value="<?php echo $pesanan['id'] ?>">
            <input type="hidden" id="nopesan" value="<?php echo $pesanan['no_pesan'] ?>">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $pesanan['judul'] ?></h5>
                <p class="card-text"><b>Jadwal: <?php echo $pesanan['jadwal'] ?></b></p>
              </div>
              <?php
                foreach($details as $detail){
              ?>
              <ul class="list-group list-group-flush">
                <input type="hidden" id="idtiket" value="<?php echo $detail['id']; ?>">
                <li class="list-group-item"><?php echo $detail['nokursi'] ?> &nbsp; <a id="hapustiket" href=""> Hapus</a></li>
              </ul>
              <?php
                }
              ?>
              <div class="card-body">
                <a href="#" class="card-link">Edit</a>
                <a href="<?php echo base_url(); ?>home/hapuspesan/<?php echo $pesanan['no_pesan']; ?>" class="card-link">Hapus Semua</a>
              </div>
            </div>
            <br>
            <br>
            <br>
            <div class="form-group row">
              <label class="control-label col-2"><b></b></label>
              <div class="col-7">
                <button class="btn btn-primary" type="submit" id="konfirmasi">Bayar</button>
              </div>
            </div>
          </form>
  <?php
    }
  ?>

</div>
<script>
  function refresh_page(){
    var id = $('#idpesan').val();
    var nopesan = $('#nopesan').val();
    $.ajax({
      url: '<?php echo base_url(); ?>home/konfirmasipesan',
      type: 'get',
      data: { 'id': id, 'nopesan': nopesan },
      success:function(response){
        $('#container').html(response);
      }
    });
  }
  $(document).ready(function() {

    $('#hapustiket').on('click', function(e) {
      e.preventDefault();
      console.log('hai');
      var id = $('#idtiket').val();
      console.log(id);
      $.ajax({
          url: '<?php echo base_url(); ?>home/hapusdetail',
          type: 'post',
          data: { 'id': id },
        success:function(html){
          if(html == 1){
            alert('Tiket Berhasil Terhapus!');
            refresh_page();
          }
        }
      })
    })
  })

</script>