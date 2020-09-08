<br>
<br>
<style>
        .txt-center {
            text-align: center;
        }
        input[type=checkbox] {
            width: 25px;
            margin: 20px;
            cursor: pointer;
        }
        input[type=checkbox]:before {
            content: "";
            width: 50px;
            height: 50px;
            border-radius: 5px;
            -webkit-border-radius: 5px; /* Safari 3-4, iOS 1-3.2, Android 1.6- */
            -moz-border-radius: 5px; /* Firefox 1-3.6 */
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            border: 3px solid #ff9800;
            background-color: #cfa8a8;
        }

        input[type=checkbox]:checked:before {
            background-color: Green;
        }
        input[type=checkbox]:disabled:before {
            background-color: red;
        }
    </style>
<div class="container">
<?php
  $awal = $this->db->select('no_pesan')->from('tr_pesan_temp')->order_by('no_pesan', 'DESC')->get();
  // echo $awal->row()->no_pesan;
  if(empty($awal->row()->no_pesan)){
    $nopesan = "1";
  } else {
    $nopesan = ((int)$awal->row()->no_pesan)+1;
  }
  foreach($item as $film){
    $id_film = $film['id_film'];
    echo '<h2 class="txt-center">Pesan Tiket '.$film['judul'].'</h2>
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-2">
            <img src="'.base_url().'assets/Images/'.$film['foto'].'" class="card-img" alt="'.$film['judul'].'">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">'.$film['judul'].'</h5>
              <p class="card-text">'.$film['sinopsis'].'</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>';
  }
?>
<div class="row">
  <div class="col-12">
    <form method="post" action="<?php echo base_url(); ?>home/savepesantemp" id="konfirmasi">
      <input type="hidden" name="no_pesan" id="no_pesan" value="<?php echo $nopesan; ?>">
      <input type="hidden" name="id_film" id="id_film" value="<?php echo $id_film; ?>">
    <div class="form-group row">
      <label class="control-label col-2"><b>Jadwal</b></label>
      <div class="col-7">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="jadwal1" name="id_jadwal" class="custom-control-input" value="1">
          <label class="custom-control-label" for="jadwal1">Siang</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="jadwal2" name="id_jadwal" class="custom-control-input" value="2">
          <label class="custom-control-label" for="jadwal2">Malam</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-2"><b>Tiket Yang Dipesan</b></label>
      <div class="col-7">
        <select class="form-control" id="tiket" v-model="jmltiket">
          <?php for($i=1;$i<11;$i++){ ?>
          <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
        <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-2"><b>Tempat Duduk</b></label>
      <div class="col-7">
        <div class="seatStructure txt-center">
          <table id="tpduduk">
            <tr>
              <td></td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <!-- <?php for($d=1;$d<6;$d++){ ?>
                <td><?php echo $d; ?></td>
              <?php } ?> -->
            </tr>
            <tr>
              <?php for($k='A';$k<'E';$k++){ ?>
                <tr>
                  <td><?php echo $k; ?></td>
                  <?php for($j=1;$j<=4;$j++){ ?>
                  <td>
                    <input name="kursi[]" type="checkbox" class="seats" @change="cek" value="<?php echo $k.$j ?>" v-model="check">
                  </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="form-group row">
      <label class="control-label col-2"><b></b></label>
      <div class="col-7">
        <button class="btn btn-primary" type="submit" id="konfirmasi">Konfirmasi Pesanan</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
<!-- /end of container -->
<script>
  var baseurl = '<?php echo base_url() ?>';
  new Vue({
    el: "#container",
    data:{
      check:[],
      jmltiket:'',
      counter:0,
    },
    methods: {
      cek(){

        var kursi = document.getElementsByName('kursi[]');
        var tiket = this.jmltiket;
        var total = 0;
        for(let i=0; i < kursi.length; i++){

          if(kursi[i].checked){
            total = total + 1;
          }
          console.log(total);
          if(total>tiket){
            alert('hanya bisa pesan '+tiket+' kursi');
            kursi[i].checked = false;
            return false;
          }

        }
      },
      coba(){
        $.ajax({
          url: `${baseurl}home/coba`,
          type: 'post',
          success:function(response){
            $('#container').html(response);
          }
        });
      }
    }
  });

  // $(document).ready(function() {
  //   $('#konfirmasi').on('submit', function(e) {
  //     e.preventDefault();
  //     var $this = $(this);
  //     $.ajax({
  //       url: baseurl+'home/pesan/konfirmasi',
  //       type: 'POST',
  //       data: $this.serialize(),
  //       success:function(html){
  //         $('#container').html();
  //       },
  //     });
  //   });
  // });
</script>