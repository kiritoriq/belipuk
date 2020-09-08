<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->
  </ol>
  <div class="carousel-inner">
    <!-- <div class="carousel-item active">
      <img src="<?php //echo base_url(); ?>assets/Images/julien-andrieux-332817-unsplash.png" class="d-block w-100" alt="Nonton">
    </div> -->
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>assets/Images/np_1_1.jpg" class="d-block w-100" alt="NPK">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/Images/urea_5_1.png" class="d-block w-100" alt="Urea Pusri">
    </div>
    <!-- <div class="carousel-item">
      <img src="<?php //echo base_url(); ?>assets/Images/karen-zhao-643916-unsplash.png" class="d-block w-100" alt="Mari Nonton">
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
<!-- <center><h3>Film Populer Hari Ini</h3></center> -->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-biru" style="color: #fff">
                        <h3 style="margin: 0 0 0 !important; color: #fff">Pesan Secara Online Sekarang &nbsp;<i class="fa fa-pencil"></i></h3>
                    </div>
                    <form id="simpanpesan" action="<?php echo base_url() ?>portal/postpesan" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap <b>(*)</b>:</label>
                                        <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email <b>(*)</b>:</label>
                                        <input type="email" class="validate[required] form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <p style="margin-top: 30px"><b>*)</b>: Wajib Diisi<br><b>**)</b>: Jika Jenis Laporan Infrastruktur, wajib lampirkan gambar terkini sebagai file pendukung</p>
                                    </div> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pwd">Nomor HP/Telepon <b>(*)</b>:</label>
                                        <input type="text" class="validate[required] form-control" maxlength="12" placeholder="Nomor HP/Telepon" name="notelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Alamat <b>(*)</b>:</label>
                                        <textarea class="validate[required] form-control" placeholder="Jl. Agathis no.1030, rt. 10 rw. 08, Kelurahan Plamongansari, Kecamatan Pedurungan, Kota Semarang" name="alamat" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <h3 style="color: #005ba2">Pilih Produk <i style="color: #000" class="fa fa-archive"></i></h3>
                                    <hr>
                                    <div class="form-group">
                                        <label>Pilih Produk <b>(*)</b>:</label>
                                        <?php echo $this->query->selectProduk("produk") ?>
                                        <!-- <input type="text" class="form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Ukuran <b>(*)</b>:</label>
                                        <div id="xkemasan">
                                            <select name="kemasan" id="kemasan" class="form-control">
                                                <option value="">.:Pilihan:.</option>
                                            </select>
                                        </div>
                                        <!-- <input type="email" class="form-control" placeholder="Email" name="email" required> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Harga <b>(*)</b>:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="validate[required] form-control num gaji" id="harga" name="harga" style="text-align: right" readonly required>
                                        </div>
                                        <!-- <input type="text" class="form-control" maxlength="12" placeholder="Nomor HP/Telepon" name="notelp"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Item <b>(*)</b></label>
                                        <input type="text" class="validate[required, number] form-control" id="jml" name="jml" >
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <button type="button" class="btn btn-success" id="masukkan">Masukkan ke Daftar >></button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id='tabel_rincian'>
                                            <thead class="bg-biru">
                                            <tr>
                                                <th style="text-align: center;">#</th>
                                                <th width="2%" style="text-align: center;">No.</th>
                                                <th style="text-align: center;">Kode Barang</th>
                                                <th style="text-align: center;">Nama Barang</th>
                                                <th style="text-align: center;">Ukuran</th>
                                                <th style="text-align: center;">Harga Satuan</th>
                                                <!-- <th style="text-align: center;"></th> -->
                                                <th style="text-align: center;">Jumlah</th>
                                                <!-- <th style="text-align: center;">Diskon (%)</th> -->
                                                <th style="text-align: center;">Total</th>
                                            </tr>
                                            </thead>   
                                            <tbody>
                                            
                                            </tbody>
                                            <tfoot>
                                            <tr style="background-color: #3333">
                                                <td colspan="4" style="text-align: right;font-weight: bold">Total Ukuran</td>
                                                <td id="total_ukuran" class="" style="text-align: right; font-weight: bold"></td>
                                                <input type="hidden" name="totals_ukuran" id="totals_ukuran">
                                                <td colspan="2" style="text-align: right;font-weight: bold">Total Harga</td>
                                                <td id="total_tabel" class="number" style="text-align: right;font-weight: bold"></td>
                                                <input type="hidden" name="totals_tabel" id="totals_tabel">
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="xnpwp">
                                <!-- <div id="xnpwp"></div> -->
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="form-group" style="text-align: center">
                                    <button type="reset" class="btn btn-warning"> <i class="fa fa-refresh" style="color: #000"></i> Reset</button>
                                    &nbsp;
                                    &nbsp;
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        <!-- /end of .col-12 -->
    </div>
    <!-- /end of .row -->
</div>

<script>
    var biaya = {
        id : null,
        kode : null,
        nama: null,
        hargasatuan : null,
        jumlah : null,
        total : null,
        ukuran : null,
        jml_ukuran : null,
    };
    var total_uk = 0;
    var temptotal=0;
    var total_tabel_countable=0;

    function getHarga() {
        var id_kemasan = $('#kemasan').val();
        var selected = $('#kemasan').find('option:selected');
        biaya.ukuran = selected.data('recid');
        // console.log(biaya.ukuran);
        $.ajax({
            url: '<?php echo base_url() ?>portal/gethargaproduk',
            type: 'post',
            data: { 'id': id_kemasan },
            success: function(response) {
                $('#harga').val(response);
                $('.gaji').number(true);
                biaya.hargasatuan = $('#harga').val();
                // console.log(biaya);
            }
        })
    }


    $(document).ready(function() {

        $('#produk').change(function(e) {
            e.preventDefault();
            biaya.id += 1;
            biaya.kode = $('option:selected',this).attr('value');
            biaya.nama = $('option:selected',this).text();
            var kd = $(this).val();
            $.ajax({
                url: '<?php echo base_url() ?>portal/pilihkemasan',
                type: 'post',
                data: { 'kd_produk': kd },
                success: function(response) {
                    $("#xkemasan").html(response);
                    $('#kemasan').change(getHarga).trigger('change');
                }
            })
        });

        $('#masukkan').click(function(e) {
            if(!isNaN($('#jml').val())) {
                biaya.jumlah = $('#jml').val();
                biaya.total = parseInt(biaya.hargasatuan * biaya.jumlah);
                biaya.jml_ukuran = parseInt(biaya.jumlah * biaya.ukuran);
                var kemasan = "";
                if(biaya.kode == 'B01') {
                    kemasan = biaya.ukuran+" "+"L";
                } else {
                    kemasan = biaya.ukuran+" "+"Kg";
                }
                $("#tabel_rincian tbody").append(
                    '<tr>'
                        +'<td style="text-align: center;width: 25px"><a class="delete_rincian" style="cursor:pointer"><i class="fa fa-times-circle" style="color: #dc3545 !important"></i></a>'
                            +'<input type="hidden" name="kode_barang[]" value="'+biaya.kode+'">'
                            +'<input type="hidden" name="nama_barang[]" value="'+biaya.nama+'">'
                            +'<input type="hidden" name="total[]" value="'+biaya.total+'">'
                            +'<input type="hidden" name="ukuran[]" value="'+biaya.ukuran+'">'
                            +'<input type="hidden" name="jumlah[]" value="'+biaya.jumlah+'">'
                        +'<td style="text-align:center;" class="nomor_tabel">'+biaya.id+'</td>'
                        +'<td>'+biaya.kode+'</td>'
                        +'<td>'+biaya.nama+'</td>'
                        +'<td>'+kemasan+'<input type="hidden" name="uks[]" class="uks countable" value="'+biaya.jml_ukuran+'"></td>'
                        +'<td style="text-align: right;">'+'<span class="number">'+biaya.hargasatuan+'</span></td>'
                        +'<td style="text-align: right;">'+biaya.jumlah+'</td>'
                        +'<td style="text-align:right">'
                            +'<span class="total number">'+biaya.total+'</span>'
                            +'<input type="hidden" name="totals[]" class="totals countable" value="'+biaya.total+'">'
                        +'</td>'
                    +'</tr>'
                );
                renumber_tabel();
            }
            $('#tabel_rincian .delete_rincian').click(function(e) {
                $(this).parent().parent().remove();
                renumber_tabel();
            });
        });

        $('#simpanpesan').validationEngine();
        $('#simpanpesan').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            $.ajax({
                url: $this.attr('action'),
                type: 'post',
                data: $this.serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                    if(res.status === true) {
                        bootbox.alert(res.msg, function() {
                            window.open('<?php echo base_url() ?>portal/invoice/'+res.nopesan);
                            location.reload();
                        })
                    } else {
                        bootbox.alert(res.msg);
                    }
                }
            })
        })

        function renumber_tabel() {
            var total_tabel_countable = 0;
            var total_uk_countable = 0;
            var total_tabel_persen = 0;
            var jum = 0;
                $("#tabel_rincian .nomor_tabel").each(function(index) {
                    $(this).html(index+1);
                });

                $("#tabel_rincian").find('.totals').filter('.countable').each(function() {
                    total_tabel_countable  += parseInt($(this).val());
                    // jum = $(this).closest('tr').find('.jmls').val();
                    // $(this).prev().html(jum);
                    // $(this).val(jum);
                    // console.log(total_tabel_countable);
                });

                $("#tabel_rincian").find('.uks').filter('.countable').each(function() {
                    var a = 0;
                    total_uk_countable += parseInt($(this).val());
                    // console.log(tot_uk);
                });

                var tot_uk = total_uk_countable+" Kg";
                console.log(tot_uk);

                $('#total_tabel').html(total_tabel_countable);
                $('#totals_tabel').val(total_tabel_countable);
                $('#totalharga').val(total_tabel_countable);
                $('#total_ukuran').html(tot_uk);
                $('#totals_ukuran').val(total_uk_countable);
                $('.number').number(true, 0, ',', '.');

                if(total_uk_countable >= 1000) {
                    $.ajax({
                        url: '<?php echo base_url() ?>portal/getnpwp',
                        type: 'post',
                        data: { 'tot_uk': total_uk_countable },
                        success: function(response) {
                            $('#xnpwp').html(response);
                        }
                    })
                } else {
                    var html = "<input type='hidden' name='nik'>"+"<input type='hidden' name='npwp'>";
                    $('#xnpwp').html(html);
                } 
            }

    })
</script>